@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>My Gallery</h2>
        </div>
    </div>

    <div class="row">

	    <div class="col-md-8">
	    	@if($galleries->count()>0)
	    		<table class="table table-striped table-responsive table-bordered">
	    			
	    				<tr>
	    					<th>Name of Gallery</th>
	    					<th></th>
	    				</tr>
	    				
	    			
	    			<tbody>
	    				@foreach ($galleries as $gallery)

	    				<tr>
	    					<td>{{$gallery->name}}
	    						<span class="pull-right">
	    							{{ $gallery->images()->count() }}
	    						</span>
	    					</td>
	    					<td>
	    						<a href="{{url('gallery/view/'.$gallery->id)}}">View</a>/
	    					    <a href="{{url('gallery/delete/'.$gallery->id)}}">Delete</a>
	    					</td>
	    				</tr>

	    				@endforeach
	    			</tbody>
	    		</table>
	    	@endif
	    </div>		    

    	<div class="col-md-4">
    		
		    <div class="panel panel-default">
		    	<div class="panel-heading">Create Gallery</div>
		    	<div class="panel-body">
		    		<form class="form" method="post" action="{{url('gallery/save')}}"> 
		    			
		    			{{ csrf_field() }}
		    			<div class="form-group">

		    				<input type="text" name="gallery_name" value="{{ old('gallery_name') }}" id="gallery_name" class="form-control" placeholder="Name of the Gallery">   				
		    			</div>
		    			<button class="btn btn-primary">Create</button>
		    		</form>
		    	</div>
		    </div>
		    @if (count($errors) > 0)
    			<div class="alert alert-danger">
    				<ul>
    					@foreach ($errors->all() as $error)
    						<li>{{ $error }}</li>
    					@endforeach
    				</ul>
    			</div>
    		@endif		
    	</div>
    </div>
</div>

@endsection
