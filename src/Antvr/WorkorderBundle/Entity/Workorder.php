<?php

namespace Antvr\WorkorderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workorder
 */
class Workorder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $clientName;

    /**
     * @var string
     */
    private $clientPhone;

    /**
     * @var boolean
     */
    private $problemSource;

    /**
     * @var boolean
     */
    private $typeLevel1;

    /**
     * @var boolean
     */
    private $typeLevel2;

    /**
     * @var boolean
     */
    private $typeLevel3;

    /**
     * @var string
     */
    private $problemContent;

    /**
     * @var string
     */
    private $replyContent;

    /**
     * @var string
     */
    private $remark;

    /**
     * @var boolean
     */
    private $result;

    /**
     * @var \DateTime
     */
    private $createTime;

    /**
     * @var integer
     */
    private $createUser;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     * @return Workorder
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientPhone
     *
     * @param string $clientPhone
     * @return Workorder
     */
    public function setClientPhone($clientPhone)
    {
        $this->clientPhone = $clientPhone;

        return $this;
    }

    /**
     * Get clientPhone
     *
     * @return string
     */
    public function getClientPhone()
    {
        return $this->clientPhone;
    }

    /**
     * Set problemSource
     *
     * @param boolean $problemSource
     * @return Workorder
     */
    public function setProblemSource($problemSource)
    {
        $this->problemSource = $problemSource;

        return $this;
    }

    /**
     * Get problemSource
     *
     * @return boolean
     */
    public function getProblemSource()
    {
        return $this->problemSource;
    }

    /**
     * Set typeLevel1
     *
     * @param boolean $typeLevel1
     * @return Workorder
     */
    public function setTypeLevel1($typeLevel1)
    {
        $this->typeLevel1 = $typeLevel1;

        return $this;
    }

    /**
     * Get typeLevel1
     *
     * @return boolean
     */
    public function getTypeLevel1()
    {
        return $this->typeLevel1;
    }

    /**
     * Set typeLevel2
     *
     * @param boolean $typeLevel2
     * @return Workorder
     */
    public function setTypeLevel2($typeLevel2)
    {
        $this->typeLevel2 = $typeLevel2;

        return $this;
    }

    /**
     * Get typeLevel2
     *
     * @return boolean
     */
    public function getTypeLevel2()
    {
        return $this->typeLevel2;
    }

    /**
     * Set typeLevel3
     *
     * @param boolean $typeLevel3
     * @return Workorder
     */
    public function setTypeLevel3($typeLevel3)
    {
        $this->typeLevel3 = $typeLevel3;

        return $this;
    }

    /**
     * Get typeLevel3
     *
     * @return boolean
     */
    public function getTypeLevel3()
    {
        return $this->typeLevel3;
    }

    /**
     * Set problemContent
     *
     * @param string $problemContent
     * @return Workorder
     */
    public function setProblemContent($problemContent)
    {
        $this->problemContent = $problemContent;

        return $this;
    }

    /**
     * Get problemContent
     *
     * @return string
     */
    public function getProblemContent()
    {
        return $this->problemContent;
    }

    /**
     * Set replyContent
     *
     * @param string $replyContent
     * @return Workorder
     */
    public function setReplyContent($replyContent)
    {
        $this->replyContent = $replyContent;

        return $this;
    }

    /**
     * Get replyContent
     *
     * @return string
     */
    public function getReplyContent()
    {
        return $this->replyContent;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Workorder
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set result
     *
     * @param boolean $result
     * @return Workorder
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return boolean
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return Workorder
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Set createUser
     *
     * @param integer $createUser
     * @return Workorder
     */
    public function setCreateUser($createUser)
    {
        $this->createUser = $createUser;

        return $this;
    }

    /**
     * Get createUser
     *
     * @return integer
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }
    /**
     * @var \DateTime
     */
    private $doneTime;


    /**
     * Set doneTime
     *
     * @param \DateTime $doneTime
     * @return Workorder
     */
    public function setDoneTime($doneTime)
    {
        $this->doneTime = $doneTime;

        return $this;
    }

    /**
     * Get doneTime
     *
     * @return \DateTime
     */
    public function getDoneTime()
    {
        return $this->doneTime;
    }
}
