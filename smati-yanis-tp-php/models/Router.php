<?php
namespace Models;

class Router{

  private $routes = [];

  public function get($uri, $callback){
    $this->routes["GET"][$uri] = $callback;
  }

  public function post($uri, $callback){
    $this->routes["POST"][$uri] = $callback;
  }

  public function run(){
    $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $method = $_SERVER["REQUEST_METHOD"];

    if(!isset($this->routes[$method][$uri])){
      echo "Page introuvable.";
      exit;
    }

    call_user_func($this->routes[$method][$uri]);
  }

}