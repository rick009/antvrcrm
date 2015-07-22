<?php

namespace Icsoc\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * CcAdmins
 */
class CcAdmins implements UserInterface, \Serializable
{
    /**
     * @var boolean
     */
    private $agentGrade;

    /**
     * @var string
     */
    private $agentAccount;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $account;

    /**
     * @var string
     */
    private $password;

    /**
     * @var integer
     */
    private $superiorAgent;

    /**
     * @var boolean
     */
    private $agentStatus;

    /**
     * @var integer
     */
    private $province;

    /**
     * @var integer
     */
    private $city;

    /**
     * @var integer
     */
    private $county;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $represention;

    /**
     * @var string
     */
    private $contactPhone;

    /**
     * @var string
     */
    private $contactor;

    /**
     * @var string
     */
    private $officePhone;

    /**
     * @var string
     */
    private $mobilePhone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $aptitude1;

    /**
     * @var boolean
     */
    private $aptitude2;

    /**
     * @var boolean
     */
    private $aptitude3;

    /**
     * @var boolean
     */
    private $aptitude4;

    /**
     * @var integer
     */
    private $addTime;

    /**
     * @var boolean
     */
    private $localType;

    /**
     * @var boolean
     */
    private $localPreMinutes;

    /**
     * @var string
     */
    private $localPreFee;

    /**
     * @var string
     */
    private $remark;

    /**
     * @var string
     */
    private $localAfterRate;

    /**
     * @var string
     */
    private $localRate;

    /**
     * @var string
     */
    private $longRate;

    /**
     * @var boolean
     */
    private $longType;

    /**
     * @var boolean
     */
    private $longPreMinutes;

    /**
     * @var string
     */
    private $longPreFee;

    /**
     * @var string
     */
    private $longAfterRate;

    /**
     * @var string
     */
    private $specialRate;

    /**
     * @var boolean
     */
    private $specialType;

    /**
     * @var boolean
     */
    private $specialPreMinutes;

    /**
     * @var string
     */
    private $specialPreFee;

    /**
     * @var string
     */
    private $specialAfterRate;

    /**
     * @var string
     */
    private $phoneMonthly;

    /**
     * @var string
     */
    private $agentMonthly;

    /**
     * @var string
     */
    private $trunkMonthly;

    /**
     * @var integer
     */
    private $lastLogin;

    /**
     * @var string
     */
    private $lastIp;

    /**
     * @var string
     */
    private $actionList = 'all';

    /**
     * @var boolean
     */
    private $systemAdmin;

    /**
     * @var integer
     */
    private $id;

    private $vccId;
    private $adminName = '系统管理员';
    private $winIp;
    private $vccCode;
    private $userId = '系统管理员';
    private $userNum = '系统管理员';
    private $userType = 0;
    private $userQueues = '';
    private $roleGrade = 0;
    private $loginType = 3;

    /**
     * Set agentGrade
     *
     * @param boolean $agentGrade
     * @return CcAdmins
     */
    public function setAgentGrade($agentGrade)
    {
        $this->agentGrade = $agentGrade;

        return $this;
    }

    /**
     * Get agentGrade
     *
     * @return boolean
     */
    public function getAgentGrade()
    {
        return $this->agentGrade;
    }

    /**
     * Set agentAccount
     *
     * @param string $agentAccount
     * @return CcAdmins
     */
    public function setAgentAccount($agentAccount)
    {
        $this->agentAccount = $agentAccount;

        return $this;
    }

    /**
     * Get agentAccount
     *
     * @return string
     */
    public function getAgentAccount()
    {
        return $this->agentAccount;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return CcAdmins
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set account
     *
     * @param string $account
     * @return CcAdmins
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return CcAdmins
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set superiorAgent
     *
     * @param integer $superiorAgent
     * @return CcAdmins
     */
    public function setSuperiorAgent($superiorAgent)
    {
        $this->superiorAgent = $superiorAgent;

        return $this;
    }

    /**
     * Get superiorAgent
     *
     * @return integer
     */
    public function getSuperiorAgent()
    {
        return $this->superiorAgent;
    }

    /**
     * Set agentStatus
     *
     * @param boolean $agentStatus
     * @return CcAdmins
     */
    public function setAgentStatus($agentStatus)
    {
        $this->agentStatus = $agentStatus;

        return $this;
    }

    /**
     * Get agentStatus
     *
     * @return boolean
     */
    public function getAgentStatus()
    {
        return $this->agentStatus;
    }

    /**
     * Set province
     *
     * @param integer $province
     * @return CcAdmins
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return integer
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param integer $city
     * @return CcAdmins
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set county
     *
     * @param integer $county
     * @return CcAdmins
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return integer
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return CcAdmins
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set represention
     *
     * @param string $represention
     * @return CcAdmins
     */
    public function setRepresention($represention)
    {
        $this->represention = $represention;

        return $this;
    }

    /**
     * Get represention
     *
     * @return string
     */
    public function getRepresention()
    {
        return $this->represention;
    }

    /**
     * Set contactPhone
     *
     * @param string $contactPhone
     * @return CcAdmins
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Set contactor
     *
     * @param string $contactor
     * @return CcAdmins
     */
    public function setContactor($contactor)
    {
        $this->contactor = $contactor;

        return $this;
    }

    /**
     * Get contactor
     *
     * @return string
     */
    public function getContactor()
    {
        return $this->contactor;
    }

    /**
     * Set officePhone
     *
     * @param string $officePhone
     * @return CcAdmins
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;

        return $this;
    }

    /**
     * Get officePhone
     *
     * @return string
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     * @return CcAdmins
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return CcAdmins
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return CcAdmins
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CcAdmins
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set aptitude1
     *
     * @param boolean $aptitude1
     * @return CcAdmins
     */
    public function setAptitude1($aptitude1)
    {
        $this->aptitude1 = $aptitude1;

        return $this;
    }

    /**
     * Get aptitude1
     *
     * @return boolean
     */
    public function getAptitude1()
    {
        return $this->aptitude1;
    }

    /**
     * Set aptitude2
     *
     * @param boolean $aptitude2
     * @return CcAdmins
     */
    public function setAptitude2($aptitude2)
    {
        $this->aptitude2 = $aptitude2;

        return $this;
    }

    /**
     * Get aptitude2
     *
     * @return boolean
     */
    public function getAptitude2()
    {
        return $this->aptitude2;
    }

    /**
     * Set aptitude3
     *
     * @param boolean $aptitude3
     * @return CcAdmins
     */
    public function setAptitude3($aptitude3)
    {
        $this->aptitude3 = $aptitude3;

        return $this;
    }

    /**
     * Get aptitude3
     *
     * @return boolean
     */
    public function getAptitude3()
    {
        return $this->aptitude3;
    }

    /**
     * Set aptitude4
     *
     * @param boolean $aptitude4
     * @return CcAdmins
     */
    public function setAptitude4($aptitude4)
    {
        $this->aptitude4 = $aptitude4;

        return $this;
    }

    /**
     * Get aptitude4
     *
     * @return boolean
     */
    public function getAptitude4()
    {
        return $this->aptitude4;
    }

    /**
     * Set addTime
     *
     * @param integer $addTime
     * @return CcAdmins
     */
    public function setAddTime($addTime)
    {
        $this->addTime = $addTime;

        return $this;
    }

    /**
     * Get addTime
     *
     * @return integer
     */
    public function getAddTime()
    {
        return $this->addTime;
    }

    /**
     * Set localType
     *
     * @param boolean $localType
     * @return CcAdmins
     */
    public function setLocalType($localType)
    {
        $this->localType = $localType;

        return $this;
    }

    /**
     * Get localType
     *
     * @return boolean
     */
    public function getLocalType()
    {
        return $this->localType;
    }

    /**
     * Set localPreMinutes
     *
     * @param boolean $localPreMinutes
     * @return CcAdmins
     */
    public function setLocalPreMinutes($localPreMinutes)
    {
        $this->localPreMinutes = $localPreMinutes;

        return $this;
    }

    /**
     * Get localPreMinutes
     *
     * @return boolean
     */
    public function getLocalPreMinutes()
    {
        return $this->localPreMinutes;
    }

    /**
     * Set localPreFee
     *
     * @param string $localPreFee
     * @return CcAdmins
     */
    public function setLocalPreFee($localPreFee)
    {
        $this->localPreFee = $localPreFee;

        return $this;
    }

    /**
     * Get localPreFee
     *
     * @return string
     */
    public function getLocalPreFee()
    {
        return $this->localPreFee;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return CcAdmins
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
     * Set localAfterRate
     *
     * @param string $localAfterRate
     * @return CcAdmins
     */
    public function setLocalAfterRate($localAfterRate)
    {
        $this->localAfterRate = $localAfterRate;

        return $this;
    }

    /**
     * Get localAfterRate
     *
     * @return string
     */
    public function getLocalAfterRate()
    {
        return $this->localAfterRate;
    }

    /**
     * Set localRate
     *
     * @param string $localRate
     * @return CcAdmins
     */
    public function setLocalRate($localRate)
    {
        $this->localRate = $localRate;

        return $this;
    }

    /**
     * Get localRate
     *
     * @return string
     */
    public function getLocalRate()
    {
        return $this->localRate;
    }

    /**
     * Set longRate
     *
     * @param string $longRate
     * @return CcAdmins
     */
    public function setLongRate($longRate)
    {
        $this->longRate = $longRate;

        return $this;
    }

    /**
     * Get longRate
     *
     * @return string
     */
    public function getLongRate()
    {
        return $this->longRate;
    }

    /**
     * Set longType
     *
     * @param boolean $longType
     * @return CcAdmins
     */
    public function setLongType($longType)
    {
        $this->longType = $longType;

        return $this;
    }

    /**
     * Get longType
     *
     * @return boolean
     */
    public function getLongType()
    {
        return $this->longType;
    }

    /**
     * Set longPreMinutes
     *
     * @param boolean $longPreMinutes
     * @return CcAdmins
     */
    public function setLongPreMinutes($longPreMinutes)
    {
        $this->longPreMinutes = $longPreMinutes;

        return $this;
    }

    /**
     * Get longPreMinutes
     *
     * @return boolean
     */
    public function getLongPreMinutes()
    {
        return $this->longPreMinutes;
    }

    /**
     * Set longPreFee
     *
     * @param string $longPreFee
     * @return CcAdmins
     */
    public function setLongPreFee($longPreFee)
    {
        $this->longPreFee = $longPreFee;

        return $this;
    }

    /**
     * Get longPreFee
     *
     * @return string
     */
    public function getLongPreFee()
    {
        return $this->longPreFee;
    }

    /**
     * Set longAfterRate
     *
     * @param string $longAfterRate
     * @return CcAdmins
     */
    public function setLongAfterRate($longAfterRate)
    {
        $this->longAfterRate = $longAfterRate;

        return $this;
    }

    /**
     * Get longAfterRate
     *
     * @return string
     */
    public function getLongAfterRate()
    {
        return $this->longAfterRate;
    }

    /**
     * Set specialRate
     *
     * @param string $specialRate
     * @return CcAdmins
     */
    public function setSpecialRate($specialRate)
    {
        $this->specialRate = $specialRate;

        return $this;
    }

    /**
     * Get specialRate
     *
     * @return string
     */
    public function getSpecialRate()
    {
        return $this->specialRate;
    }

    /**
     * Set specialType
     *
     * @param boolean $specialType
     * @return CcAdmins
     */
    public function setSpecialType($specialType)
    {
        $this->specialType = $specialType;

        return $this;
    }

    /**
     * Get specialType
     *
     * @return boolean
     */
    public function getSpecialType()
    {
        return $this->specialType;
    }

    /**
     * Set specialPreMinutes
     *
     * @param boolean $specialPreMinutes
     * @return CcAdmins
     */
    public function setSpecialPreMinutes($specialPreMinutes)
    {
        $this->specialPreMinutes = $specialPreMinutes;

        return $this;
    }

    /**
     * Get specialPreMinutes
     *
     * @return boolean
     */
    public function getSpecialPreMinutes()
    {
        return $this->specialPreMinutes;
    }

    /**
     * Set specialPreFee
     *
     * @param string $specialPreFee
     * @return CcAdmins
     */
    public function setSpecialPreFee($specialPreFee)
    {
        $this->specialPreFee = $specialPreFee;

        return $this;
    }

    /**
     * Get specialPreFee
     *
     * @return string
     */
    public function getSpecialPreFee()
    {
        return $this->specialPreFee;
    }

    /**
     * Set specialAfterRate
     *
     * @param string $specialAfterRate
     * @return CcAdmins
     */
    public function setSpecialAfterRate($specialAfterRate)
    {
        $this->specialAfterRate = $specialAfterRate;

        return $this;
    }

    /**
     * Get specialAfterRate
     *
     * @return string
     */
    public function getSpecialAfterRate()
    {
        return $this->specialAfterRate;
    }

    /**
     * Set phoneMonthly
     *
     * @param string $phoneMonthly
     * @return CcAdmins
     */
    public function setPhoneMonthly($phoneMonthly)
    {
        $this->phoneMonthly = $phoneMonthly;

        return $this;
    }

    /**
     * Get phoneMonthly
     *
     * @return string
     */
    public function getPhoneMonthly()
    {
        return $this->phoneMonthly;
    }

    /**
     * Set agentMonthly
     *
     * @param string $agentMonthly
     * @return CcAdmins
     */
    public function setAgentMonthly($agentMonthly)
    {
        $this->agentMonthly = $agentMonthly;

        return $this;
    }

    /**
     * Get agentMonthly
     *
     * @return string
     */
    public function getAgentMonthly()
    {
        return $this->agentMonthly;
    }

    /**
     * Set trunkMonthly
     *
     * @param string $trunkMonthly
     * @return CcAdmins
     */
    public function setTrunkMonthly($trunkMonthly)
    {
        $this->trunkMonthly = $trunkMonthly;

        return $this;
    }

    /**
     * Get trunkMonthly
     *
     * @return string
     */
    public function getTrunkMonthly()
    {
        return $this->trunkMonthly;
    }

    /**
     * Set lastLogin
     *
     * @param integer $lastLogin
     * @return CcAdmins
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return integer
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     * @return CcAdmins
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set actionList
     *
     * @param string $actionList
     * @return CcAdmins
     */
    public function setActionList($actionList)
    {
        $this->actionList = $actionList;

        return $this;
    }

    /**
     * Get actionList
     *
     * @return string
     */
    public function getActionList()
    {
        return 'all';
    }

    /**
     * Set systemAdmin
     *
     * @param boolean $systemAdmin
     * @return CcAdmins
     */
    public function setSystemAdmin($systemAdmin)
    {
        $this->systemAdmin = $systemAdmin;

        return $this;
    }

    /**
     * Get systemAdmin
     *
     * @return boolean
     */
    public function getSystemAdmin()
    {
        return $this->systemAdmin;
    }

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
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->account;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {

    }

    /**
     * 为了和 ccod 保持一致；
     * @return string
     */
    public function getAdminName()
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getFlag()
    {
        return "ccadmin"; //用来标识是从那个表来登陆上的；
    }

    public function getVccId()
    {
        return $this->vccId;
    }

    /**
     * Get userType
     *
     * @return boolean
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @return int
     */
    public function getRoleGrade()
    {
        return $this->roleGrade;
    }

    public function getUserNum()
    {
        return $this->userNum;
    }

    public function getLoginType()
    {
        return $this->loginType;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserQueues()
    {
        return $this->userQueues;
    }

    public function getWinIp()
    {
        return $this->winIp;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
                $this->id,
                $this->vccId,
                $this->vccCode,
                $this->winIp,
                $this->adminName,
                $this->userId,
                $this->actionList,
                $this->userType,
                $this->userQueues,
                $this->loginType,
                $this->roleGrade,
                $this->password,
                $this->account,
            ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->vccId,
            $this->vccCode,
            $this->winIp,
            $this->adminName,
            $this->userId,
            $this->actionList,
            $this->userType,
            $this->userQueues,
            $this->loginType,
            $this->roleGrade,
            $this->password,
            $this->account,
        ) = unserialize($serialized);
    }
}
