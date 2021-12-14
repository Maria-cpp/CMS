<?php


namespace app\models;


use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;

class Post extends DbModel
{
    public int $id;
    public string $title = '';
    public string $author = '';
    public string $content = '';
    public string $image_URL = '';
    public string $category_id = '';
    public string $tags = '';

    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'description' =>[self::RULE_REQUIRED],
        ];
    }

    public function Post($db): bool
    {

        $userdata = Post::findOne(['id'=> $this->id]);
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
        return ['id', 'author', 'title', 'content', 'image_URL', 'category_id', 'tag'];
    }

    public function setAttributres(int $id, string $author, string $title, string $content)
    {
       $this->id = $id;
       $this->author = $author;
       $this->title=$title;
       $this->content=$content;
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    // add in DB Model class
    public function GetRecedntPostID()
    {
        $query = Application::$app->db->pdo->prepare("SELECT * FROM posts WHERE id=(SELECT max(id) FROM posts);");
        $query->execute();
        return $query->fetchObject(static::class);
    }
}