<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  include('Urls.class.php');

  $l = new Urls();
  $link = $l->get_url(Urls::alphaToNum($_GET['id']));

  if(is_null($link)){
      die('Unknown short URL.');
  }

  $l->add_hit(Urls::alphaToNum($_GET['id']));

  header('Location: ' . $link);