<!-- Album Removed -->
<div class="py-5">
	<div class="container">
		<div class="row">
			<?php $__currentLoopData = $privateFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.private', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php $__currentLoopData = $sharedFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.shared', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php $__currentLoopData = $colabFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.colabing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div> 
	</div> 
</div>