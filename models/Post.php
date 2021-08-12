<?php


namespace app\models;


use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;

class Post extends DbModel
{
    public int $id;
    public string $title = '';
    public string $content = '';
    public string $created_at = '';

    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'description' =>[self::RULE_REQUIRED],
        ];
    }

    public function Post($db): bool
    {

        $userdata = Post::findOne(['id'=> $this->id], $db);
        if(!$this->sessionCredentials($userdata)){
            return false;
        }
        return Application::$app->login($userdata);
    }


    public function labels(): array
    {
        return [
            'title' => 'Title',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }

    public function send(): bool
    {
        return true;
    }


    public function tableName(): string
    {
        return 'posts';
    }

    public function attributes(): array
    {
        return ['id', 'author', 'title', 'content', 'image', 'category_id', 'tag'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }
}