@extends('layout')

@section('content')

<div class="container mt-5">
	<h2>Add New Receipe</h2>

	<!-- Validation errors showing -->
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form method="POST" action="/receipe">
		{{csrf_field()}}
		<div class="form-group">
			<label for="receipeName">Receipe Name</label>
			<input type="text" name="name" class="form-control" value="{{old('name')}}" required="">
		</div>

		<div class="form-group">
			<label for="ingredients">Ingredients</label>
			<input type="text" name="ingredients" class="form-control" value="{{old('ingredients')}}" required="">
		</div>

		<div class="form-group">
			<label for="category">Category</label>
			<input type="text" name="category" class="form-control" value="{{old('category')}}" required="">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
	

@endsection