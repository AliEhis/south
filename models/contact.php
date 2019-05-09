<?php

namespace app\models;
use yii\db\ActiveRecord;


class contact extends ActiveRecord
{
    //Never forget that ActiveRecord is A Repository

    private $name;
    private $phone;
    private $email;
    private $message;

    /**
     * @return string
     */
    public static function tablename()
    {
        return "contact";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, phone and message are required
            [['name', 'phone', 'email', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

}