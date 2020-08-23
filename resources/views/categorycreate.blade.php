@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<h2>Add New Category</h2>

	<!-- Validation errors showing -->
	@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	<form method="POST" action="/category">
		{{csrf_field()}}
		<div class="form-group">
			<label for="categoryName">Category Name</label>
			<input type="text" name="name" class="form-control" value="{{old('name')}}" required="">
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<input type="text" name="description" class="form-control" value="{{old('description')}}" required="">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection