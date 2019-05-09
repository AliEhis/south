<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class SignUp extends ActiveRecord
{
    private $id;
    private $firstname;
    private $lastname;
    private $username;
    private $phone;
    private $email;
    private $dob;
    private $address;
    private $state;
    private $country;
    private $image;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return SignUp
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @param $username
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @param $password
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     * @return SignUp
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return SignUp
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return SignUp
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return SignUp
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }


    /**
     * @return string
     */
    public static function tablename()
    {
        return "signUp";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
        {
            return [
                // username, email, and password are required
                [['firstname', 'lastname', 'username', 'phone', 'email', 'image','dob', 'state', 'country','address' ], 'required'],
                // email has to be a valid email address
                ['email', 'email'],
            ];
        }



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'userName' => 'User Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'image' => 'Image',
        ];
    }



}