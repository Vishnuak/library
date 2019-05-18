@extends('layout')

@section('title', 'Export')

@section('content')
	<!--<h1 class="display-3">Books Management System</h1>-->

	<div class="bg-light p-2">
		<a href="{{'/'}}" class="float-right"><i class="fas fa-home" title="home"></i></a>
		
		<form class="col-sm-12 col-md-8 col-lg-6 p-5" method="POST" action="{{'/export'}}">
			{{ csrf_field() }}

			<fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-label col-sm-2 pt-0">Type</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="exportType" id="gridRadios1" value="csv" checked>
			          <label class="form-check-label" for="gridRadios1">
			            CSV
			          </label>
			        </div>
			        <div class="form-check">
			          <input class="form-check-input" type="radio" name="exportType" id="gridRadios2" value="xml">
			          <label class="form-check-label" for="gridRadios2">
			            XML
			          </label>
			        </div>
			      </div>
			    </div>
			  </fieldset>

			  <div class="form-group row">
			    <label for="inputPassword3" class="col-sm-2 col-form-label">Contents</label>
			    <div class="col-sm-10">
			      <select class="custom-select" name="content">
					  <option value="1"selected>Title Only</option>
					  <option value="2">Author Only</option>
					  <option value="3">Both</option>
					</select>
			    </div>
			  </div>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-primary">Export</button>
		    </div>
		  </div>
		</form>
		
	</div>


@endsection
