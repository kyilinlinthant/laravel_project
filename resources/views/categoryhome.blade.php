@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card-body">
					@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <h2 class="mb-5">Category Home Page</h2>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div>
                                    <a href="/category/create"><button class="btn btn-success mt-1 mb-4">Create</button></a>
                                </div>  
                            </div>
                        </div>
                        <!-- flash message session -->
                        @if(session("message"))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session("message") }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

						@foreach($data as $value)
                    		<a href="/category/{{$value->id}}">
                    			<li>{{$value->name}}</li>
                    		</a>
                    		<hr>
                    	@endforeach
                    </div>

                    {{$data->links()}}
                    
				</div>
			</div>
		</div>
	</div>
@endsection