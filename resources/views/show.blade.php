@extends('layouts.app')

@section('content')

    <div class="container mt-2">
        <div class="row">

            <div class="col-lg-10 col-md-10 col-sm-10">
                <h2>{{$receipe->name}}</h2>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1">
                <a href="/receipe/{{$receipe->id}}/edit"><button class="btn btn-success">Edit</button></a>
            </div>

            <div class="col-lg-1 col-md-1 col-sm-1">
                <form method="POST" action="/receipe/{{$receipe->id}}">
                    {{method_field("DELETE")}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        
        </div>

        <img src="{{'/images/'.$receipe->image}}" width="150" height="150" alt=""><br>

            <li> Ingredients - {{$receipe->ingredients}} </li>
            <li> Category - {{$receipe->categories->name}} </li>
        
    </div>	
    
@endsection