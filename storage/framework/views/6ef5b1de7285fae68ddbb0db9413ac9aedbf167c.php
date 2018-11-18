<?php $__env->startSection('style'); ?>
<link href="/css/dashboard.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<div class="topnav" style="position: fixed; top:0%; left: 0; right: 0; z-index: 99;">
        <a href="home"  color="#71b346" ><?php echo e(Auth::user()->username); ?></a>
        <a href="/chats" >Chats</a>
        <a href="/global" class="active">Global Files</a>
        <a href="/logout" class="float-right">Logout</a>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main role="main" style="background: #1e2129">

        <?php echo $__env->make('global.showGlobal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>