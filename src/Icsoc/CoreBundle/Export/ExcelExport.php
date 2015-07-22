<?php
/**
 * This file is part of easycrm, created by PhpStorm.
 * Author: LouXin
 * Date: 2014/12/23 10:00
 * File: ExcelExportHelper.php
 */

namespace Icsoc\CoreBundle\Export;

use Doctrine\ORM\Tools\Export\ExportException;
use Icsoc\CoreBundle\Export\DataType\DataTypeInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use PHPExcel;

class ExcelExport implements ExportInterface
{
    /** @var  ContainerInterface */
    private $container;

    /** @var array $cells 表格的抬头 */
    private $cells = array(
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC',
        'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ',
        'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BA', 'BB', 'BC', 'BD', 'BE',
        'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS',
        'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ', 'CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG',
        'CH', 'CI', 'CJ', 'CK', 'CL', 'CM', 'CN', 'CO', 'CP', 'CQ', 'CR', 'CS', 'CT', 'CU',
        'CV', 'CW', 'CX', 'CY', 'CZ'
    );

    private $phpexcel;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->phpexcel = new PHPExcel();
    }

    /**
     * {@inheritdoc}
     */
    public function export($source, $fileName = '')
    {
        if (!$source instanceof DataTypeInterface) {
            throw new ExportException('The source is not instanceof the DataTypeInterface.');
        }

        $data = $source->getData();
        $type = $source->getType();
        $fields = $source->getFields();

        if (empty($fields)) {
            throw new ExportException('The fields of the source is not set.');
        }

        //获取数据
        switch ($type) {
            case DataTypeInterface::TYPE_SQL://SQL
                /** @var \Doctrine\DBAL\Connection $conn */
                $conn = $this->container->get('doctrine.dbal.default_connection');
                $data = $conn->fetchAll($data);
                break;
            case DataTypeInterface::TYPE_ARRAY://数组
                if (!is_array($data)) {
                    throw new ExportException(
                        sprintf('The data type is %s, but the $data is not an array', DataTypeInterface::TYPE_ARRAY)
                    );
                }
                break;
            default:
                throw new ExportException(
                    sprintf(
                        'The data type is not in [%s,%s]',
                        DataTypeInterface::TYPE_ARRAY,
                        DataTypeInterface::TYPE_SQL
                    )
                );
                break;
        }

        $cacheMethod = \PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
        $cacheSettings = array();
        \PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

        $this->phpexcel->getProperties()->setCreator("中通天鸿（北京）通信科技有限公司")
            ->setLastModifiedBy("中通天鸿（北京）通信科技有限公司")
        ;
        $this->phpexcel->setActiveSheetIndex(0);

        //如果存在表头则设置
        $cellIndex = 0;
        foreach ($fields as $field => $value) {
            $title = empty($value['name']) ? $field : $value['name'];
            $cell = $this->cells[$cellIndex] . '1';
            $this->phpexcel->getActiveSheet()->setCellValue($cell, $title);
            $cellIndex++;
        }

        //导出数据
        foreach ($data as $index => $row) {
            $cellIndex = 0;
            foreach ($fields as $field => $value) {
                //字段类型
                $type = empty($value['type']) ? 'string' : $value['type'];
                //字段属性
                $options = empty($value['options']) ? array() : $value['options'];
                $cell = $this->cells[$cellIndex++] . ($index+2);

                //处理字段类型
                switch ($type) {
                    case ExportInterface::FIELD_TYPE_STRING://字符串类型
                        $pValue = isset($row[$field]) ? strval($row[$field]) : '0';
                        break;
                    case ExportInterface::FIELD_TYPE_DATE://日期
                        $pValue = !empty($row[$field]) ? date('Y-m-d', $row[$field]) : '0';
                        break;
                    case ExportInterface::FIELD_TYPE_DATETIME://日期时间
                        $pValue = !empty($row[$field]) ? date('Y-m-d H:i:s', $row[$field]) : '0';
                        break;
                    case ExportInterface::FIELD_TYPE_ASSOCIATEDARRAY://关联数组
                        $associatedArray = empty($value['associatedArray'][$field]) ?
                            array() : $value['associatedArray'][$field];

                        if (empty($associatedArray)) {
                            //如果未设置，则直接显示该值
                            $pValue = $row[$field];
                        } else {
                            //如果设置了关联数组，但是该值不在关联数组中，则显示为“未设置”
                            $pValue = isset($associatedArray[$row[$field]]) ?
                                $associatedArray[$row[$field]] : '未设置'.$row[$field];
                        }
                        break;
                    default:
                        $pValue = isset($row[$field]) ? strval($row[$field]) : '0';
                        break;
                }

                //处理字段属性
                $this->phpexcel->getActiveSheet()->getStyle($cell)->applyFromArray($options);

                $this->phpexcel->getActiveSheet()->setCellValue($cell, $pValue);
            }
            unset($data[$index]);
        }

        $fileName = empty($fileName) ? 'Data'.date('YmdHis').'.xlsx' : $fileName . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8');
        header("Content-Disposition: attachment;filename=$fileName");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save("php://output");
        exit;
    }

    public function getName()
    {
        return 'excel';
    }
}
