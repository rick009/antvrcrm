<?php

namespace Antvr\WorkorderBundle\Controller;

use Antvr\WorkorderBundle\Entity\Workorder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Icsoc\CoreBundle\Export\DataType\ArrayType;
use Symfony\Component\VarDumper\VarDumper;

class WorkorderController extends Controller
{
    private $problemSources = array(
        1 => '电话',
        2 => '邮件',
        3 => 'QQ',
        4 => '微博',
        5 => '微信',
    );

    // 头盔/机饕/体感枪/VR相机/购买问题/售后服务/建议
    private $typeLevels = array(
        1 => array(
            'name' => '头盔',
            'children' => array(
                1 => array(
                    'name' => '操作类',
                    'children' => array(
                        1 => array('name' => '操作连接'),
                        2 => array('name' => '模式设置'),
                    )
                ),
                2 => array(
                    'name' => '使用类',
                    'children' => array(
                        1 => array('name' => '控制类'),
                        2 => array('name' => '字体类'),
                        3 => array('name' => '字幕类'),
                        4 => array('name' => '画面类'),
                        5 => array('name' => '其他'),
                    )
                ),
                3 => array(
                    'name' => '技术类',
                    'children' => array(
                        1 => array('name' => '其他'),
                        2 => array('name' => 'SDK说明'),
                    )
                ),
                4 => array(
                    'name' => '产品类',
                    'children' => array(
                        1 => array('name' => '产品说明'),
                        2 => array('name' => '产品优势'),
                        3 => array('name' => '产品用途'),
                    )
                ),
            ),
        ),
        2 => array(
            'name' => '机饕',
            'children' => array(
                1 => array(
                    'name' => '操作类',
                    'children' => array(
                        1 => array('name' => '使用方法'),
                    )
                ),
                2 => array(
                    'name' => '使用类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                3 => array(
                    'name' => '技术类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                4 => array(
                    'name' => '产品类',
                    'children' => array(
                        1 => array('name' => '产品说明'),
                        2 => array('name' => '产品优势'),
                        3 => array('name' => '产品优势'),
                    )
                ),
            ),
        ),
        3 => array(
            'name' => '体感枪',
            'children' => array(
                1 => array(
                    'name' => '操作类',
                    'children' => array(
                        1 => array('name' => '使用方法'),
                    )
                ),
                2 => array(
                    'name' => '使用类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                3 => array(
                    'name' => '技术类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                4 => array(
                    'name' => '产品类',
                    'children' => array(
                        1 => array('name' => '产品说明'),
                        2 => array('name' => '产品优势'),
                        3 => array('name' => '产品优势'),
                    )
                ),
            ),
        ),
        4 => array(
            'name' => 'VR相机',
            'children' => array(
                1 => array(
                    'name' => '操作类',
                    'children' => array(
                        1 => array('name' => '使用方法'),
                    )
                ),
                2 => array(
                    'name' => '使用类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                3 => array(
                    'name' => '技术类',
                    'children' => array(
                        1 => array('name' => '其他'),
                    )
                ),
                4 => array(
                    'name' => '产品类',
                    'children' => array(
                        1 => array('name' => '产品说明'),
                        2 => array('name' => '产品优势'),
                        3 => array('name' => '产品优势'),
                    )
                ),
            ),
        ),
        5 => array(
            'name' => '购买问题',
            'children' => array(
                1 => array(
                    'name' => '渠道类'
                ),
                2 => array(
                    'name' => '预定类'
                ),
                3 => array(
                    'name' => '发布类'
                ),
            ),
        ),
        6 => array(
            'name' => '售后服务',
            'children' => array(
                1 => array(
                    'name' => '退货类'
                ),
                2 => array(
                    'name' => '换货类'
                ),
                3 => array(
                    'name' => '维修类'
                ),
            ),
        ),
        7 => array(
            'name' => '建议',
            'children' => array(
                1 => array(
                    'name' => '产品类'
                ),
                2 => array(
                    'name' => '服务类'
                ),
                3 => array(
                    'name' => '技术类'
                ),
            ),
        ),
    );

    /**
     * 新建工单
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->request->all();

            $em = $this->get('doctrine.orm.default_entity_manager');
            $workorder = new Workorder();
            $workorder->setClientName($data['user_name']);
            $workorder->setClientPhone($data['user_phone']);
            $workorder->setProblemContent($data['problem_content']);
            $workorder->setProblemSource($data['problem_source']);
            $workorder->setRemark($data['remark']);
            $workorder->setTypeLevel1($data['type_level1']);
            $workorder->setTypeLevel2($data['type_level2']);
            $workorder->setTypeLevel3($data['type_level3']);
            $workorder->setReplyContent($data['reply_content']);
            $workorder->setResult($data['result']);
            $workorder->setCreateTime(new \DateTime());
            $workorder->setCreateUser($this->getUser()->getId());

            if (isset($data['is_done']) && $data['is_done']) {
                $workorder->setDoneTime(new \DateTime());
            } else {
                $workorder->setDoneTime(new \DateTime('0000-00-00'));
            }

            $em->persist($workorder);
            $em->flush();

            $message = '工单新建成功';
            $type = "success";
            $link = array(
                array('text'=>'新建工单','href'=>$this->generateUrl('antvr_workorder_new')),
            );

            $data = array(
                'data'=>array(
                    'msg_detail' => $message,
                    'type' => $type,
                    'link' => $link
                )
            );

            return $this->redirect($this->generateUrl('icsoc_ui_message', $data));
        }

        return $this->render('AntvrWorkorderBundle:Workorder:index.html.twig', array(
            'problemSources' => $this->problemSources,
            'typeLevels' => $this->typeLevels,
            'action' => 'antvr_workorder_new'
        ));
    }

    /**
     * 编辑表单
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction($id)
    {
        $request = $this->get('request');
        $em = $this->get('doctrine.orm.default_entity_manager');
        /** @var Workorder $workorder */
        $workorder = $em->getRepository('AntvrWorkorderBundle:Workorder')->find($id);

        if ($request->getMethod() == 'POST') {
            $data = $request->request->all();

            $workorder->setClientName($data['user_name']);
            $workorder->setClientPhone($data['user_phone']);
            $workorder->setProblemContent($data['problem_content']);
            $workorder->setProblemSource($data['problem_source']);
            $workorder->setRemark($data['remark']);
            $workorder->setTypeLevel1($data['type_level1']);
            $workorder->setTypeLevel2($data['type_level2']);
            $workorder->setTypeLevel3($data['type_level3']);
            $workorder->setReplyContent($data['reply_content']);
            $workorder->setResult($data['result']);

            if (isset($data['is_done']) && $data['is_done']) {
                $workorder->setDoneTime(new \DateTime());
            } else {
                $workorder->setDoneTime(new \DateTime('0000-00-00'));
            }

            $em->persist($workorder);
            $em->flush();

            $message = '工单编辑成功';
            $type = "success";
            $link = array(
                array('text'=>'工单列表','href'=>$this->generateUrl('antvr_workorder_list')),
            );

            $data = array(
                'data'=>array(
                    'msg_detail' => $message,
                    'type' => $type,
                    'link' => $link
                )
            );

            return $this->redirect($this->generateUrl('icsoc_ui_message', $data));
        }

        return $this->render('AntvrWorkorderBundle:Workorder:index.html.twig', array(
            'problemSources' => $this->problemSources,
            'typeLevels' => $this->typeLevels,
            'workorder' => $workorder,
            'action' => 'antvr_workorder_edit'
        ));
    }

    /**
     * 获取二级分类
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     */
    public function getTypeLevel2Action(Request $request)
    {
        $typelevel1 = $request->query->get('typelevel1');

        return new JsonResponse(
            $this->typeLevels[$typelevel1]['children']
        );
    }

    /**
     * 获取二级分类
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     */
    public function getTypeLevel3Action(Request $request)
    {
        $typelevel1 = $request->query->get('typelevel1');
        $typelevel2 = $request->query->get('typelevel2');

        return new JsonResponse(
            isset($this->typeLevels[$typelevel1]['children'][$typelevel2]['children']) ?
            $this->typeLevels[$typelevel1]['children'][$typelevel2]['children'] : array()
        );
    }

    public function listAction()
    {
        return $this->render('AntvrWorkorderBundle:Workorder:list.html.twig', array(
            'problemSources' => $this->problemSources,
            'typeLevels' => $this->typeLevels
        ));
    }

    public function listQueryAction(Request $request)
    {
        $page = $request->get('page', '1');
        $limit = $request->get('rows', '10');
        $sort = $request->get('sort', '1');
        $order = $request->get('order', 'DESC');
        $keyword = $request->get('keyword', '');
        $result = $request->get('result', '');
        $startTime = $request->get('start_time', '');
        $endTime = $request->get('end_time', '');
        $export = $request->get('export', '');

        $where = '';

        if (!empty($keyword)) {
            $where .= ' AND (client_name like "%' . $keyword .'%" OR client_phone like "%' . $keyword .'%")';
        }
        if ($result !== '') {
            $where .= ' AND result='.$result.' ';
        }
        if (!empty($startTime)) {
            $where .= ' AND create_time >=\''.$startTime.'\' ';
        }
        if (!empty($endTime)) {
            $where .= ' AND create_time <=\''.$endTime.'\' ';
        }

        $conn = $this->get('doctrine.dbal.default_connection');

        $total = $conn->fetchColumn(
            'SELECT count(*) ' .
            'FROM workorders WHERE 1 ' . $where
        );

        $total_pages = ceil($total/$limit);

        $page = $page > $total_pages ? $total_pages : $page;
        $start = $limit*$page - $limit;
        $start = $start > 0 ? $start : 0;

        if (empty($export)) {
            $data = $conn->fetchAll(
                'SELECT * ' .
                'FROM workorders WHERE 1 ' . $where . "ORDER BY $sort $order limit $start,$limit"
            );
        } else {
            $data = $conn->fetchAll(
                'SELECT * ' .
                'FROM workorders WHERE 1 ' . $where . "ORDER BY $sort $order"
            );
        }

        // 查询所有用户
        $em = $this->get('doctrine.orm.default_entity_manager');
        $userEntities = $em->getRepository('AntvrUserBundle:User')->findAll();
        $users = array();
        foreach ($userEntities as $k => $v) {
            $users[$v->getId()] = $v->getName();
        }

        $rows = array();

        foreach ($data as $k => $v) {
            $rows[$k] = $v;
            $rows[$k]['problem_source'] = isset($this->problemSources[$v['problem_source']]) ?
                $this->problemSources[$v['problem_source']] : '';
            $rows[$k]['result_name'] = $v['result'] == 1 ? '已解决' : '未解决';
            $typeLevel1 = $v['type_level1'];
            $typeLevel1Name = empty($this->typeLevels[$typeLevel1]['name']) ?
                '' : $this->typeLevels[$typeLevel1]['name'];
            $typeLevel2 = $v['type_level2'];
            $typeLevel2Name = empty($this->typeLevels[$typeLevel1]['children'][$typeLevel2]['name'])
                ? '' : $this->typeLevels[$typeLevel1]['children'][$typeLevel2]['name'];
            $typeLevel3 = $v['type_level3'];
            $typeLevel3Name = empty($this->typeLevels[$typeLevel1]['children'][$typeLevel2]['children'][$typeLevel3]['name']) ?
                '' : $this->typeLevels[$typeLevel1]['children'][$typeLevel2]['children'][$typeLevel3]['name'];
            $rows[$k]['type_level'] = $typeLevel1Name.'-'.$typeLevel2Name.'-'.$typeLevel3Name;
            $rows[$k]['create_user_name'] = isset($users[$v['create_user']]) ? $users[$v['create_user']] : '';
            $rows[$k]['problem_content'] = str_ireplace(array("\r", "\n"), '', $v['problem_content']);
            $rows[$k]['reply_content'] = str_ireplace(array("\r", "\n"), '', $v['reply_content']);
            $rows[$k]['remark'] = str_ireplace(array("\r", "\n"), '', $v['remark']);
        }

        $list = array(
            'total' => $total,
            'rows' => $rows,
        );

        if (!empty($export)) {
            try {
                $title = array(
                    'client_name' => '客户名称',
                    'client_phone' => '联系电话',
                    'problem_source' => '问题来源',
                    'type_level' => '咨询类别',
                    'problem_content' => '问题内容',
                    'reply_content' => '回复内容',
                    'remark' => '备注',
                    'result_name' => '状态',
                    'create_user_name' => '创建人',
                    'create_time' => '创建时间',
                    'done_time' => '完成时间'
                );

                $datas = array();
                $fields = array();

                foreach ($rows as $k => $v) {
                    foreach ($title as $key => $val) {
                        if (!isset($v[$key])) {
                            $v[$key] = '';
                        }
                        $datas[$k][$key] = $v[$key];
                    }
                }
                foreach ($title as $item => $itemText) {
                    $fields[$item] = array(
                        'name' => $itemText,
                        'type' => 'string'
                    );
                }

                $source = new ArrayType($datas, $fields);
                $excel = $this->get('icsoc_core.export.csv');
                $excel->export($source);
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }

        return new JsonResponse($list);
    }
}
