<?php


namespace app\models;


use JetBrains\PhpStorm\ArrayShape;
use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;
use zum\phpmvc\Model;

class tags extends DbModel
{
    public string $id = '';
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


    public function findtag(string $tags) {
        
        $tagsArr = explode(',', $tags);

        $AllTags =$this->fetchAll(Application::$app->db);

        $tagsNames = array();
        foreach($AllTags as $DbTags){
            array_push($tagsNames, $DbTags['tag_name']);
        }

        $result=array();
        $i=0;
        
            for($i; $i<sizeof($tagsArr); $i++){
                if(!in_array($tagsArr[$i], $tagsNames))
                {
                    echo $tagsArr[$i];
                    array_push($result, $tagsArr[$i]);
                    $name = $tagsArr[$i];
                    echo $name;
                    $query = Application::$app->db->pdo->prepare("INSERT INTO tags (tag_name) VALUES ('$name');");
                    $query->execute();
                }
            }  
        return;  
    }
}