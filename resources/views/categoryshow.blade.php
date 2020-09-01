@extends('layouts.app')

@section('content')
	<div class="container mt-2">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10">
                <h2>{{$category->name}}</h2>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1">
                <a href="/category/{{$category->id}}/edit"><button class="btn btn-success">Edit</button></a>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1">
                <form method="POST" action="/category/{{$category->id}}">
                    {{method_field("DELETE")}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        
        </div>

        <li> Category Name - {{$category->name}} </li>
        <li> Description - {{$category->description}} </li>
   
    </div>	
@endsection