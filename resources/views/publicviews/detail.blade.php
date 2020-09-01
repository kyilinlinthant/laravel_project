@extends('layouts.public')

@section('content')

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-12">
              <div class="card mb-12 box-shadow">
                <div class="card-body">
                  <img src="{{'/images/'.$receipe->image}}" width="150" height="150" alt="">
                  <br>
                  <h3>{{$receipe->name}}</h3>
                  <p class="card-text">{{$receipe->ingredients}}</p>
                  <p>{{$receipe->categories->name}}</p>
                  <p>Date - {{ date('d/m/Y'), strtotime($receipe->created_at) }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/"><button type="button" class="btn btn-sm btn-outline-secondary">Back</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </main>

@endsection
