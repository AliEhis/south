<?php

namespace app\models;
use yii\db\ActiveRecord;


class SessionStore extends ActiveRecord
{
    //Never forget that ActiveRecord is A Repository

    private $sessionId;
    private $key;
    private $value;
    private $timestamp;

    /**
     * @return string
     */
    public static function tablename()
    {
        return "session_store";
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
     * @return SessionStore
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return SessionStore
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return SessionStore
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return SessionStore
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }


}