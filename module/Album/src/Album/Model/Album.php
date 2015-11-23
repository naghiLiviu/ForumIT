<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 11/23/15
 * Time: 1:45 PM
 */
namespace Album\Model;

class Album
{
    public $id;
    public $artist;
    public $title;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
    }
}