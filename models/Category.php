<?php

namespace app\models;

use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;

class Category extends DbModel
{
    public string $id = '';
    public string $category_name = '';

    public function rules(): array
    {
        return [
            'category_name' =>[self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'category';
    }

    public function attributes(): array
    {
        return ['category_name'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getCategoryName(string $id){
        $data = $this->findOne(['id' => $id], Application::$app->db);
        return $data->category_name;
    }

    public function labels(): array
    {
            return [
                'category_name' => 'Enter Category Name'
            ];
    }
}