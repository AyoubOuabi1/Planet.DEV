<?php

class Article
{
    public  $id;
    public $title;
    public $description;
    public $date;
    public $image;
    public $userId;
    public $cat_id;

    /**
     * @param $id
     * @param $title
     * @param $description
     * @param $date
     * @param $image
     * @param $userId
     * @param $cat_id
     */
    public function __construct($id, $title, $description, $date, $image, $userId, $cat_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->image = $image;
        $this->userId = $userId;
        $this->cat_id = $cat_id;
    }


}