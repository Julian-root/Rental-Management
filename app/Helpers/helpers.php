<?php
use Illuminate\Support\Str;
use App\Models\User;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("DEFAULTPASSWORD", "password");


function contain($container, $contenu) {
    return Str::contains($container, $contenu);
}

function setmenuClass($route, $classe) {
    $routeActuel = request()->route()->getName();
    if(contain($routeActuel, $route)){
       return $classe; 
    }
    return "";
}

function setmenuActive($route) {
    $routeActuel = request()->route()->getName();
    if(contain($routeActuel, $route)){
       return "active"; 
    }
    return "";
}