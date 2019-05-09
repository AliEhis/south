<?php

namespace app\models;

use yii\db\ActiveRecord;


class login extends ActiveRecord
{
    //Never forget that ActiveRecord is A Repository

    private $id;
    private $email;
    private $password;
    private $otpPass;
    private $isAdmin;
    private $signupId;


    /**
     * @return string
     */
    public static function tablename()
    {
        return "login";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, phone and message are required
            [['email', 'password', 'isAdmin', 'signupId'], 'required'],
            // email has to be a valid email address

        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return login
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $name
     * @return login
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return login
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtpPass()
    {
        return $this->otpPass;
    }

    /**
     * @param mixed $otpPass
     * @return login
     */
    public function setOtpPass($otpPass)
    {
        $this->otpPass = $otpPass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     * @return login
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
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
     * @return login
     */
    public function setSignupId($signupId)
    {
        $this->signupId = $signupId;
        return $this;
    }




}