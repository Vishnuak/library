@extends('layout')

@section('title', 'Edit')

@section('content')
	<!--<h1 class="display-3">Books Management System</h1>-->

	<div class="bg-light p-2">
		<a href="{{'/'}}" class="float-right"><i class="fas fa-home" title="home"></i></a>
		@isset($book)
			<form class="col-sm-12 col-md-8 col-lg-6 p-5" method="POST" action="{{'/'.$book->id}}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PATCH">
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<fieldset disabled>
				  <div class="form-group row">
				    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="disabledTextInput" placeholder="Title"  value="{{$book->title}}">
				    </div>
				  </div>
				</fieldset>
			  <div class="form-group row">
			    <label for="inputAuthor" class="col-sm-2 col-form-label">Author</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputAuthor" placeholder="Author" name="author" value="{{$book->author}}" >
			    </div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-primary">Update</button>
			    </div>
			  </div>
			</form>
		@else
			<div class="alert alert-danger" role="alert">
			  Book Not Found
			</div>
		@endif
	</div>


@endsection
