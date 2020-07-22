<?php

namespace App\Http\Controllers;

use App\Receipe;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
    public function index(){
    	// dd("Hello from receipe home page");
    	$data = Receipe::all();
    	return view('home',compact('data'));

    	// dd($data);
    }
}
