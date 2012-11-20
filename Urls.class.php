<?php
  include('config/config.php');
  class Urls {
    private static $_connection;
    private $userIP;
    public function __construct() {
      if(is_null(self::$_connection)){
        global $config;
        self::$_connection = new mysqli('localhost', $config['USER'], $config['PASS'], $config['DB']);
      }
    }
    private function get_ip() {
      $this->userIP = $_SERVER['REMOTE_ADDR'];
    }
    public function add_hit($id) {
      $this->get_ip();
      $query = self::$_connection->prepare("INSERT INTO `hits` (`url`, `ip`) VALUES (?, ?)");
      $query->bind_param('is', $id, $this->userIP);
      $query->execute();
      return TRUE;
    }
    public function add_url($link, $id) {
      $this->get_ip();
      if (!is_numeric($id))
        $id=$this->alphaToNum($id);
      if (!empty($id)) {
        $query = self::$_connection->prepare("INSERT INTO `urls` (`id`, `url`, `ip`) VALUES (?, ?, ?)");
        $query->bind_param('sss', $id, $link, $this->userIP);
        $query->execute();
        return $id;
      }
      else {
        $query = self::$_connection->prepare("INSERT INTO `urls` (`url`, `ip`) VALUES (?, ?)");
        $query->bind_param('ss', $link, $this->userIP);
        $query->execute();
        return $query->insert_id;
      }
    }
    public function get_url($id) {
      $query = self::$_connection->prepare("SELECT `url` FROM `urls` WHERE `id` = ?");
      $query->bind_param('i', $id);
      $query->execute();
      $query->bind_result($url);
      $query->fetch();
      return $url;
    }
    public static function numToAlpha($num) {
      $return = "";
      $alpha = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-_";
      $n = floor($num/strlen($alpha));
      if($n > 0)
          $return .= numToAlpha($n);
      $return .= $alpha[$num % strlen($alpha)];
      return $return;
    }
    public static function alphaToNum($s) {
      $alpha = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-_";
      $return = 0;
      $i = strlen($s);
      $s = strrev($s);
      while(isset($s[--$i])){
          $return += strpos($alpha, $s[$i]) * pow(strlen($alpha), $i);
      }
      return $return;
    }
  }