<?php
namespace app\core;
class Request
{
  public function getPath()
  {
      # code...
      $putanja = $_SERVER["REQUEST_URI"] ?? "/";
      $pozicija = strpos($putanja,"?");
      if ($pozicija === false) {
        return $putanja;
      }
      $putanja = substr_replace($putanja,"",$pozicija);
                # nije isto sto i str_replace()
      return $putanja;
  }

  public function getMethod()
  {
      return strtolower($_SERVER["REQUEST_METHOD"]);
  }

  public function all()
  {
    return $_REQUEST;
  }

  public function getOne($property)
  {
    return isset($_REQUEST[$property]) ? $_REQUEST[$property]:"";
  }
}


?>