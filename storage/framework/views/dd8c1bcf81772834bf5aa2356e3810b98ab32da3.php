<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo e($gallery->name); ?></h2>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<div id="gallery-images">
    			<ul>
    				<?php foreach($gallery->images as $image): ?>
    				<li>
    					<a href="<?php echo e(url($image->file_path)); ?>" data-lightbox="roadtrip">
    						<img src="<?php echo e(url($image->file_path)); ?>">
    					</a>
    				</li>
    				<?php endforeach; ?>
    			</ul>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
    		<form action="<?php echo e(url('image/do-upload')); ?>" class="dropzone" id="addImages">
    			

    			<?php echo e(csrf_field()); ?>

    			<input type="hidden" name="gallery_id" value="<?php echo e($gallery->id); ?>">
    		</form>
    	</div>
    </div>

    <div class="row">

	    <div class="col-md-12">
	    	<a href="<?php echo e(url('gallery/list')); ?>">Back</a>
	    </div>		    

    	
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>