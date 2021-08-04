<?php


namespace app\models;


use JetBrains\PhpStorm\ArrayShape;
use zum\phpmvc\Model;

class Post extends Model
{
    public string $title = '';
    public string $description = '';
    public string $time_date = '';

    public function rules(): array
    {
        return [
            'title' =>[self::RULE_REQUIRED],
            'description' =>[self::RULE_REQUIRED],
        ];
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
}