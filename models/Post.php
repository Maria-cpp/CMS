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
    public string $name='';
    public string $type='';
    public int $size=0;

    
    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'content' =>[self::RULE_REQUIRED],
        ];
    }


    public function imagecredentials(): bool{

        $errors=[];
        if(!empty($_FILES['image'])){
            $this->type= strtolower(end(explode('.',$_FILES['image']['name'])));
            $this->size= $_FILES['image']['size'];
            $this->name= $_FILES['image']['name'];

            $expensions= array("jpeg","jpg","png");
    
            if(in_array($this->type,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
               $this->addErrorForRule($this->image_URL, self::RULE_IMAGE_TYPE );
               return false;
            }
    
            if($this->size > 2097152){
               $errors[]='File size must be excately 2 MB';
               $this->addErrorForRule($this->image_URL, self::RULE_IMAGE_SIZE );
               return false;
            }
            
            if(empty($this->errors())){
                move_uploaded_file($_FILES['image']['tmp_name'],"./src/images/".$this->name);
                $this->image_URL = "./src/images/".$this->name;
                return true;
            }

        return false;
            
        }  
    }


    public function labels(): array
    {
        return [
            'title' => 'Enter Title',
            'content' => 'Description',
            'tags'=>'Tags',
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
        return ['author', 'title', 'content', 'image_URL', 'category_id', 'tags'];
    }
    public function primaryKey(): string
    {
        return 'id';
    }

    public function save(): bool
    {
        $tag = new tags();
            
        $tag->findtag($this->tags);

        $this->author = $_SESSION['username'];

        $ret = parent::save();
            
        $data = $this->GetRecedntPostID();

        $tag->updatePostIds($data->id, $this->tags);

        return $ret;
    }

    // add in DB Model class
    public function GetRecedntPostID()
    {
        $query = Application::$app->db->pdo->prepare("SELECT * FROM posts WHERE id=(SELECT max(id) FROM posts);");
        $query->execute();
        return $query->fetchObject(static::class);
    }
}