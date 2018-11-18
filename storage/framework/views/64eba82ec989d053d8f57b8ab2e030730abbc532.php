<?php $__env->startSection('nav'); ?>
<div class="topnav" style="position: absolute; top:0%; left: 0; right: 0;">
    <a href="" class="active" color="#71b346"><?php echo e(Auth::user()->username); ?></a>
    <a href="/logout" class="float-right">Logout</a>
</div>
<?php $__env->stopSection(); ?>
