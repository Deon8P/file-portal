<div class="py-5" id="showFiles" style="position: absolute; top:8%; left: 0%; right: 0%; border-left: 2px solid #cc6600; border-radius: 15px; border-right: 2px solid #cc6600;">
    <br>
    <br>
    <br>
    <br>
<div class="container" style="overflow-y: auto; ">
    <div class="row">

        <?php if($files): ?>
        <?php if(! $files->isEmpty()): ?>

        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('global.globalFile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>

        <h1 class="text-muted text-center" style="position: absolute; left: 20%; right: 20%; top: 40%">There are no global files yet, <br><a href="/dashboard">why not upload one?</a></h1>

        <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
</div>
