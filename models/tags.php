<?php


namespace app\models;


use JetBrains\PhpStorm\ArrayShape;
use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;
use zum\phpmvc\Model;

class tags extends DbModel
{
    public int $id = 0;
    public string $tag_name = '';
    public string $post_id = '';

    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'description' =>[self::RULE_REQUIRED],
        ];
    }

    public function tableName(): string
    {
        return 'tags';
    }

    public function attributes(): array
    {
        return ['id', 'tag_name', 'post_id'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getTagName(string $id){
        $data = $this->findOne(['id' => $id], Application::$app->db);
        return $data->tag_name;
    }
}