<?php
  require "conexao.php";
  require "Wordpost.php";
  require "WordService.php";
  
  

  $wordpost = new WordPost();
  $conexao = new Conexao();
  $wordservice = new WordService($conexao, $wordpost);
  $arrayPosts = $wordservice->recuperar();

?>