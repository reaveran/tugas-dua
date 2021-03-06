@extends("layouts.application")
@section("content")

	<h2>Upload Image</h2>

	{{Form::open(array('url' => 'crudimages' , 'files' => true , 'class' => 'form-horizontal', 'role' => 'form'))}}
	<div class="form-group">
	    {{Form::label('title', 'Title', array('class' => 'col-lg-3 control-label'))}}
	    <div class="col-lg-6">
		    {{Form::text('title', null, array('class' => 'form-control', 'autofocus' => 'true'))}}
		    {{$errors->first('title')}}
	    </div>
	    <div class="clear"></div>
	</div>

	<div class="form-group">
	    {{Form::label('file', 'File', array('class' => 'col-lg-3 control-label'))}}
	    <div class="col-lg-6">
	    	{{Form::file('file','',array('class' => 'form-control', 'autofocus' => 'true'))}}
	        {{$errors->first('upload')}}
	    </div>
	    <div class="clear"></div>
	</div>

	<div class="form-group">
	    <div class="col-lg-3"></div>
	    <div class="col-lg-9">
	      {{Form::submit('Save', array('class' => 'btn btn-primary'))}}
	    </div>
	    <div class="clear"></div>
	</div>
	{{Form::close()}}
@stop