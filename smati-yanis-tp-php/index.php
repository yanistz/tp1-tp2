<?php

// PROJET FIL ROUGE : Blog - Thème voyage - Sous-catégories : Culinaire / Art / Actus Sportives + Possibilité de reviews - Si possible, devis voyage.
/**
 * Galerie photo / formulaire via lien externes ?
 * Culinaire
 * Actus sportive
 * Voyage
 * Art
 * Reviews
 * Création de devis
 */

ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";

use Models\Autoloader;

/**
 * Use autoloader to import all models
 */
Autoloader::register();

use Models\BDD;
use Models\Router;
use Controllers\SlotMachineController;
use Models\Article;
use Controllers\ErrorsController;
use Controllers\ArticlesController;
use Controllers\BlogController;

$article = new Article(BDD::connect());

$article_test = [
  "title" => "Test",
  "content" => "Contenu de test",
  "author" => "webdevoo"
];

/**
 * Utilisation classique de la méthode add(), de la classe Article
 */
// $article->add(
//   $article_test["title"],
//   $article_test["content"],
//   $article_test["author"],
// );

// var_dump($article::getById(1));

// $article_updated = [
//   "id" => 1,
//   "title" => "Test modifié",
//   "content" => "Contenu modifié",
//   "author" => "WebdevooUpdated",
//   "created_date" => new \Datetime("now")
// ];

// $article::update(
//   $article_updated["id"],
//   $article_updated["title"],
//   $article_updated["content"],
//   $article_updated["author"],
//   $article_updated["created_date"]->sub(\DateInterval::createFromDateString("1 hour"))->format("Y/m/d H:i:s"),
// );

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];
$idParam = (int) preg_replace("/[\D]+/", "", $uri);

switch (true) {
  case ($uri === "/"):
    $router->get("/", BlogController::index());
    break;
  
  case (str_contains($uri, "/articles")):
    if ($idParam && !str_contains($uri, "/update")) {
      $router->get("/articles/$idParam", ArticlesController::getById($idParam));
      exit;
    }
    else if($idParam && str_contains($uri, "/update")){
      $router->get("/articles/update/$idParam", ArticlesController::update($idParam));
      exit;
    }
    else if(!$idParam && str_contains($uri, "/update")){
      $router->post("/articles/update", ArticlesController::updateArticle());
      exit;
    }
    else if(!$idParam && str_contains($uri, "/delete")){
      $router->post("/articles/delete", ArticlesController::deleteArticle());
      exit;
    }
    $router->get("/articles", ArticlesController::getList());

    case (str_contains($uri, "/slot-machine")): 
      $router->get("/slot-machine", SlotMachineController::index());
      exit;
    case (str_contains($uri, "/play")): 
      $router->get("/play", SlotMachineController::play());
      exit;
   
    break;
  default:
    ErrorsController::launchError(404);
    break;
}

$router->run();
