<?php $__env->startSection('style'); ?>
<link href="/css/dashboard.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<div class="sidenav">
  <h5 style="color: orange">Contacts:</h5>

  <?php if($recievedMessages): ?>

  <?php if(! $recievedMessages->isEmpty()): ?>

    <?php $__currentLoopData = $recievedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <a class="nav-link btn-outline mr-1"  onclick="openSentChat(event, <?php echo e($message->id); ?><?php echo e($message->from_user); ?>)" style="color: lightgrey"><?php echo e($message->from_user); ?></a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
  <h5 class="text-muted" style="color: orange">No chats recieved</h5>
  <?php endif; ?>
  <?php endif; ?>

<?php if($sentMessages): ?>

<?php if(! $sentMessages->isEmpty()): ?>

  <?php $__currentLoopData = $sentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a class="nav-link btn-outline mr-1"  onclick="openSentChat(event, <?php echo e($message->id); ?><?php echo e($message->to_user); ?>)" style="color: orange"><?php echo e($message->to_user); ?></a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
<h5 class="text-muted" style="color: orange">No chats sent</h5>
<?php endif; ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="floating-div">
    <button type="button" class="floating-button " style="color: white; border-radius: 4px; cursor:pointer;">Send<i class="material-icons float-right ml-1">send</i></button>
</div>

<?php if($recievedMessages): ?>
<?php if(! $recievedMessages->isEmpty()): ?>
<?php $__currentLoopData = $recievedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="tab-content" id="pills-tabContent<?php echo e($message->from_user); ?>">
    <div class="tab-pane fade show" id="pills-<?php echo e($message->from_user); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($message->from_user); ?>-tab"><?php echo $__env->make('chats.recievedMessage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div>
    <button class="tablinks" onclick="openRecievedMessages(event, 'London')">London</button>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<h5 class="text-muted" style="color: orange">You have no chats.</h5>
<?php endif; ?>
<?php endif; ?>

<?php $__env->startSection('scripts'); ?>

<script>
  function openSentChat(evt, username) {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    }

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>