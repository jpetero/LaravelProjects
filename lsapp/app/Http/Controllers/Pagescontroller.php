<?php

namespace App\Http\Controllers;

// The request library is for handling the request
use Illuminate\Http\Request;


// Any controller created extends the core Controller
class Pagescontroller extends Controller
{
    public function index(){
        $title = "Welcome to Laravel!";

        // When you want to pass dynamic data to the HTML using blade as the templatig engine
        // return view("pages/index", compact("title"));

        // A better way of doing the same thing
        // with() takes in two parameters the name of the variable and how you would like to call that 
        // variable inside the templating engine respectively
        return view("pages/index")->with("title", $title);
    }

    public function about(){
        $title = "About Us";
        return view("pages/about")->with("title", $title);
    }

    public function services(){

        //Associative array
        $data = [
            "title" => "Services",
            "services" => ["Web design", "programming", "SEOs"]
        ];

        // Passing in data array in with(), such that the keys can be accessed without defining them
        return view("pages/services")->with($data);
    }
    
}
