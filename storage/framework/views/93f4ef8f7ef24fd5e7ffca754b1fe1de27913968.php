<?php $__env->startSection('style'); ?>
<link href="/css/dashboard.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<div class="sidenav">
  <h5 style="color: orange">Contacts:</h5>

  <?php if($recievedMessages): ?>

  <?php if(! $recievedMessages->isEmpty()): ?>
  
    <?php $__currentLoopData = $recievedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="nav-item">
        <a class="nav-link btn-outline-success active mr-1" id="pills-<?php echo e($message->from_user); ?>" data-toggle="pill" href="#<?php echo e($message->from_user); ?>" role="tab" aria-controls="pills-<?php echo e($message->from_user); ?>" aria-selected="false"><?php echo e($message->from_user); ?></a>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
  <?php else: ?>
  <h5 class="text-muted" style="color: orange">No chats recieved</h5>
<?php endif; ?>

<?php if($sentMessages): ?>

<?php if(! $sentMessages->isEmpty()): ?>

  <?php $__currentLoopData = $sentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="nav-item">
      <a class="nav-link btn-outline-success active mr-1" id="pills-<?php echo e($message->to_user); ?>" data-toggle="pill" href="#<?php echo e($message->to_user); ?>" role="tab" aria-controls="pills-<?php echo e($message->to_user); ?>" aria-selected="false"><?php echo e($message->to_user); ?></a>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php else: ?>
<h5 class="text-muted" style="color: orange">No chats sent</h5>
<?php endif; ?>
  </div>

  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-admin" role="tabpanel" aria-labelledby="pills-admin-tab"><?php echo $__env->make('sessions.adminForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <div class="tab-pane fade show" id="pills-manager" role="tabpanel" aria-labelledby="pills-manager-tab"><?php echo $__env->make('sessions.managerForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <div class="tab-pane fade" id="pills-employee" role="tabpanel" aria-labelledby="pills-employee-tab"><?php echo $__env->make('sessions.empForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>