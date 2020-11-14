<?php
namespace app\core;
class Request
{
  public function getPath()
  {
      # code...
      $putanja = strtolower($_SERVER["REQUEST_URI"]) ?? "/";
      $pozicija = strpos($putanja,"?");
      if ($pozicija === false) {
        return $putanja;
      }
      $putanja = substr_replace($putanja,"",$pozicija);
      return $putanja;
  }

  public function getMethod()
  {
      # code...
      return strtolower($_SERVER["REQUEST_METHOD"]);
  }

  // public function getURI()
  // {
  //     # code... NIJE NAM POTREBNO
  //     return strtolower($_SERVER["REQUEST_URI"]);

  // }

}


?>