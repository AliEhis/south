<?php

namespace app\models;
use yii\db\ActiveRecord;

class ChangeHistory extends ActiveRecord
{
    private $id;
    private $tableName;
    private $fieldName;
    private $oldValue;
    private $newValue;
    private $computerName;
    private $ipAddress;
    private $timeAdded;
    private $changedById;
    private $is_deleted = 0;

    /**
     * @param $table_name
     * @param $field_name
     * @param $computer_name
     * @param $ip_address
     * @param $old_value
     * @param $new_value
     * @param $changedById
     * @return int
     * @throws \Exception
     * @throws \yii\db\Exception
     */
    public function log($table_name, $field_name, $old_value, $new_value, $changedById)
    {
        if ($old_value==$new_value){
            return true;
        }

        return self::getDb()->createCommand()->insert(self::tablename(),
                        ["table_name" => $table_name,
                        "field_name" => $field_name,
                        "computer_name" => LoginManager::getComputer(),
                        "ip_address" => $_SERVER["REMOTE_ADDR"],
                        "old_value" => $old_value,
                        "new_value" => $new_value,
                        "changedById" => $changedById
                        ])->execute();
    }

    /**
     * @return string
     */
    public static function  tablename()
    {
        return "change_history";
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['changeById'], 'required'],

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
     * @return ChangeHistory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param mixed $tableName
     * @return ChangeHistory
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param mixed $fieldName
     * @return ChangeHistory
     */
    public function setFieldName($fieldName)
    {
        $this->fieldName = $fieldName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOldValue()
    {
        return $this->oldValue;
    }

    /**
     * @param mixed $oldValue
     * @return ChangeHistory
     */
    public function setOldValue($oldValue)
    {
        $this->oldValue = $oldValue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNewValue()
    {
        return $this->newValue;
    }

    /**
     * @param mixed $newValue
     * @return ChangeHistory
     */
    public function setNewValue($newValue)
    {
        $this->newValue = $newValue;
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
     * @return ChangeHistory
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
     * @return ChangeHistory
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
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
     * @return ChangeHistory
     */
    public function setTimeAdded($timeAdded)
    {
        $this->timeAdded = $timeAdded;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChangedById()
    {
        return $this->changedById;
    }

    /**
     * @param mixed $changedById
     * @return ChangeHistory
     */
    public function setChangedById($changedById)
    {
        $this->changedById = $changedById;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * @param int $is_deleted
     * @return ChangeHistory
     */
    public function setIsDeleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;
        return $this;
    }


}