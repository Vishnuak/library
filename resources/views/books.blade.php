@extends('layout')

@section('content')
	<!--<h1 class="display-3">Books Management System</h1>-->

	<div class="bg-light p-2">
		@foreach (['danger', 'warning', 'success', 'info'] as $key)
		 @if(Session::has($key))
		     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
		 @endif
		@endforeach
		<form class="col-sm-12 col-md-8 col-lg-6 p-5" method="POST" action="{{'/'}}">
			{{ csrf_field() }}
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		  <div class="form-group row">
		    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputTitle" placeholder="Title" name="title">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputAuthor" class="col-sm-2 col-form-label">Author</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputAuthor" placeholder="Author" name="author">
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">Add</button>
		    </div>
		  </div>
		</form>
	</div>

	<a href="/export" class="btn btn-primary btn-sm float-right">Export</a>
	<table class="table table-bordered dt-responsive nowrap" id="table"  style="width:100%">


	  	<thead>
		    <tr>
		      <th scope="col">Title</th>
		      <th scope="col">Author</th>
		      <th scope="col">Actions</th>
		    </tr>
	  	</thead>
	  	<tbody>
		  	@isset($books)
		  		@foreach($books as $book)
				    <tr>
				      <td>{{$book->title}}</td>
				      <td>{{$book->author}}</td>
				      <td>
				      	<a href="{{ route('delete', $book->id) }}" onclick="event.preventDefault();
	                        document.getElementById('delete-form').submit();"><i class="fas fa-trash-alt" title="delete"></i>
	                    </a>
	                    <a href="{{ '/'.$book->id }}"><i class="fas fa-edit" title="edit"></i>
	                    </a>

	                    <form id="delete-form" action="{{ route('delete', $book->id) }}" method="POST" style="display: none;">
	                        {{ csrf_field() }}
	                        <input type="hidden" name="_method" value="DELETE">
	                    </form>
	                  </td>
				    </tr>
			    @endforeach
		    @endisset
	  </tbody>
	</table>


@endsection

@section('js')
	<script type="text/javascript">
		
		$(document).ready(function() {
		    var table = $('#table').DataTable( {
		        fixedHeader: true
		    } );
		} );
	</script>

@endsection	
