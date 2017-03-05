@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$gallery->name}}</h2>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div id="gallery-images">
    			<ul>
    				@foreach ($gallery->images as $image)
    				<li>
    					<a href="{{ url($image->file_path) }}" data-lightbox="roadtrip">
    						<img src="{{ url($image->file_path) }}">
    					</a>
    				</li>
    				@endforeach
    			</ul>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages">
    			

    			{{ csrf_field() }}
    			<input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
    		</form>
    	</div>
    </div>

    <div class="row">

	    <div class="col-md-12">
	    	<a href="{{url('gallery/list')}}">Back</a>
	    </div>		    

    	
    </div>
</div>

@endsection
