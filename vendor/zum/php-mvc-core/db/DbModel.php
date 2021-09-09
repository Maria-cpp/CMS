<?php


namespace zum\phpmvc\db;

use zum\phpmvc\Application;
use zum\phpmvc\Model;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey():string;

    public function save(): bool
    {

        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName(" . implode(',', $attributes) . ")
            VALUES(" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;

    }


    public function findOne($where, $db)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr, $value) => "$attr = '$value'", $attributes, $where));
        $statement = $db->pdo->prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $item) {
            $statement->bindValue(":key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }


    public function fetchAll($db)
    {
        $tableName = static::tableName();
        $statement = $db->pdo->prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public function deleteOne($where, $db){
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr, $value) => "$attr = '$value'", $attributes, $where));
        $statement = $db->pdo->prepare("Delete FROM $tableName WHERE $sql");

        foreach ($where as $key => $item) {
            $statement->bindValue(":key", $item);
        }
        $statement->execute();
    }

    public function count(){
        $tableName = static::tableName();
        $statement = Application::$app->db->pdo->prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement->rowCount();
    }
    
}