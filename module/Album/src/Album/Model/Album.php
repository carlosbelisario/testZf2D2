<?php 

namespace Album\Model;

class Album
{
    /**
    *
    * @var Int $id
    */
    public $id;
    
    /**
    *
    * @var String $artis
    */
    public $artis;

    /**
    *
    * @var String $title
    */
    public $title;

    /**
    *
    * @method exchangeArray assigned the array values to the attributes of the class
    * @param array $data
    *
    */
    public function exchangeArray($data) 
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->artist = (isset($data['artist'])) ? $data['artist'] : null;
        $this->title  = (isset($data['title'])) ? $data['title'] : null;       
    }
}
