@extends("layouts.application")
@section("content")
<div class="row">
	@foreach ($crudimages as $img)
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	    	<a href="crudimages/{{$img->id}}" class="thumbnail">
	    		{{ HTML::image($img->directory, 'a picture', array('class' => '')) }}
	    	</a>
	    	<p>{{$img->title}}</p>
		    {{link_to('crudimages/'.$img->id.'/edit', 'Edit', array('class' => 'btn btn-warning'))}}
		    {{ Form::open(array('route' => array('crudimages.destroy', $img->id), 'method' => 'delete')) }}
	        {{ Form::submit('Delete', array('class' => 'btn btn-danger', "onclick" => "return confirm('are you sure?')")) }}
	     	{{ Form::close() }}
	    </div>
	    	
	@endforeach
</div>
@stop