<?php

class WordService{   
   private $conexao;
   private $wordpost;

   public function __construct(Conexao $conexao, WordPost $wordpost)
   {
       $this->conexao = $conexao->conectar();
       $this->wordpost = $wordpost;
       
   }

  public function recuperar()
  {
     $query = 'select * from posts order by id desc limit 1';
     $stmt = $this->conexao->prepare($query);
     $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}



?>