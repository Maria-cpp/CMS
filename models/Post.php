<?php


namespace app\models;


use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;
use app\models\LoginForm;

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
        $obj =  new LoginForm();
        if(!$obj->sessionCredentials($userdata)){
            return false;
        }
        return Application::$app->login($userdata);
    }


    public function labels(): array
    {
        return [
            'title' => 'Enter Title',
            'image' => 'upload Image',
            'content' => 'Description',
            'tag'=>'Tags',
            'image'=> 'Choose Image'
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

    public function setAttributres(
        int $id, 
        string $author, 
        string $title, 
        string $content, 
        string $image_URL,
        int $categoryID, 
        string $tags
        )
    {
       $this->id = $id;
       $this->author = $author;
       $this->title=$title;
       $this->content=$content;
       $this->image_URL = $image_URL;
       $this->category_id = $categoryID;
       $this->tags = $tags;
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