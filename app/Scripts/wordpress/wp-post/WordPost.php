<?php

class WordPost{
    private $id;
    private $id_user;
    private $title;
    private $content;
    private $post_date;
    private $post_time;
    private $foto;
    private $created_at;
    private $updated_at;

    public function __get($atributo)
    {
        return $this->$atributo;
        
    }
    
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}




?>