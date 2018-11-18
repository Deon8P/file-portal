<?php if($privateFiles): ?>
            <?php $__currentLoopData = $privateFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.type.private', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

			<?php if($sharedFiles): ?>
            <?php $__currentLoopData = $sharedFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.type.shared', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

			<?php if($collabFiles): ?>
            <?php $__currentLoopData = $collabFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo $__env->make('files.type.collabing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
