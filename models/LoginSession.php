<?php

namespace app\models;
use yii\db\ActiveRecord;


class LoginSession extends ActiveRecord
{
    //Never forget that ActiveRecord is A Repository

    private $sessionId;
    private $computerName;
    private $ipAddress;
    private $timeAdded;
    private $lastAction;
    private $lastVisited;
    private $signupId;
    private $is_deleted = 0;

    /**
     * @return string
     */
    public static function  tablename()
    {
        return "login_session";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // sessionId is required
            [['sessionId'], 'required'],

        ];
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param mixed $sessionId
     * @return contact
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComputerName()
    {
        return $this->computerName;
    }

    /**
     * @param mixed $computerName
     * @return contact
     */
    public function setComputerName($computerName)
    {
        $this->computerName = $computerName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     * @return contact
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastAction()
    {
        return $this->lastAction;
    }

    /**
     * @param mixed $lastAction
     * @return contact
     */
    public function setLastAction($lastAction)
    {
        $this->lastAction = $lastAction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeAdded()
    {
        return $this->timeAdded;
    }

    /**
     * @param mixed $timeAdded
     * @return contact
     */
    public function setTimeAdded($timeAdded)
    {
        $this->timeAdded = $timeAdded;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastVisited()
    {
        return $this->lastVisited;
    }

    /**
     * @param mixed $lastVisited
     * @return contact
     */
    public function setLastVisited($lastVisited)
    {
        $this->lastVisited = $lastVisited;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignupId()
    {
        return $this->signupId;
    }

    /**
     * @param mixed $signupId
     * @return contact
     */
    public function setSignupId($signupId)
    {
        $this->signupId = $signupId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * @param mixed $is_deleted
     * @return contact
     */
    public function setIsDeleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;
        return $this;
    }



}