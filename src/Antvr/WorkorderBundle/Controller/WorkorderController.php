<?php

namespace Antvr\WorkorderBundle\Controller;

use Antvr\WorkorderBundle\Entity\Workorder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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
            'typeLevels' => $this->typeLevels
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

    }
}
