<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>My Gallery</h2>
        </div>
    </div>

    <div class="row">

	    <div class="col-md-8">
	    	<?php if($galleries->count()>0): ?>
	    		<table class="table table-striped table-responsive table-bordered">
	    			
	    				<tr>
	    					<th>Name of Gallery</th>
	    					<th></th>
	    				</tr>
	    				
	    			
	    			<tbody>
	    				<?php foreach($galleries as $gallery): ?>

	    				<tr>
	    					<td><?php echo e($gallery->name); ?>

	    						<span class="pull-right">
	    							<?php echo e($gallery->images()->count()); ?>

	    						</span>
	    					</td>
	    					<td>
	    						<a href="<?php echo e(url('gallery/view/'.$gallery->id)); ?>">View</a>/
	    					    <a href="<?php echo e(url('gallery/delete/'.$gallery->id)); ?>">Delete</a>
	    					</td>
	    				</tr>

	    				<?php endforeach; ?>
	    			</tbody>
	    		</table>
	    	<?php endif; ?>
	    </div>		    

    	<div class="col-md-4">
    		
		    <div class="panel panel-default">
		    	<div class="panel-heading">Create Gallery</div>
		    	<div class="panel-body">
		    		<form class="form" method="post" action="<?php echo e(url('gallery/save')); ?>"> 
		    			
		    			<?php echo e(csrf_field()); ?>

		    			<div class="form-group">

		    				<input type="text" name="gallery_name" value="<?php echo e(old('gallery_name')); ?>" id="gallery_name" class="form-control" placeholder="Name of the Gallery">   				
		    			</div>
		    			<button class="btn btn-primary">Create</button>
		    		</form>
		    	</div>
		    </div>
		    <?php if(count($errors) > 0): ?>
    			<div class="alert alert-danger">
    				<ul>
    					<?php foreach($errors->all() as $error): ?>
    						<li><?php echo e($error); ?></li>
    					<?php endforeach; ?>
    				</ul>
    			</div>
    		<?php endif; ?>		
    	</div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>