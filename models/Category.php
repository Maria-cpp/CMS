<?php


namespace app\models;


use JetBrains\PhpStorm\ArrayShape;
use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;
use zum\phpmvc\Model;

class Category extends DbModel
{
    public string $id = '';
    public string $category_name = '';

    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'description' =>[self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'category';
    }

    public function attributes(): array
    {
        return ['id', 'category_name'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getCategoryName(string $id){
        $data = $this->findOne(['id' => $id], Application::$app->db);
        return $data->category_name;
    }
}