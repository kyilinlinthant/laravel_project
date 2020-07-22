<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$name = "Home Page";
    	return view ('home',compact('name'));
    }

    public function phpPage(){
    	$data = array(
    			"lesson1" => "This is php lesson1",
    			"lesson2" => "This is php lesson2",
    			"lesson3" => "This is php lesson3"
    	);

    	return view('php',compact('data'));
    }

    public function jsPage(){
    	$data = array(
            	"lesson1" => "This is js lesson1",
            	"lesson2" => "This is js lesson2",
            	"lesson3" => "This is js lesson3"
    	);

    	return view('js',compact('data'));
    }
}
