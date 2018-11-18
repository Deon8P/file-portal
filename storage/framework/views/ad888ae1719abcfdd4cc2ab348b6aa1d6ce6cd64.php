<?php $__env->startSection('style'); ?>
<link href="/css/login.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <img src="custom-images/Logo.png" class="transition-fade transition" style="position: absolute; left: 60% ;top:7%" width="400" height="200">

<div class="text-center form-group container">
    <br>
    <label class="h1 mb-5 " style="color: #cc6600; font-size: 100px;">File Portal</label>
</div>
<!--
  <label class="h1 mb-5 transition-fade" style="color: #cc6600; font-size: 150px; position: absolute; left: 430px; top: 0px;">word</label>
  <label class="h1 mb-5 transition-fade" style="color: white; font-size: 150px; position: absolute; left: 776px; top: 0px;">_</label>
  <label class="h1 mb-5 transition-fade" style="color: #cc6600; font-size: 155px; position: absolute; left: 800px; top: 0px">A</label>
  <label class="h1 mb-5 transition-fade" style="color: #cc6600; font-size: 150px; position: absolute; left: 910px; top: 0px">ble</label>
-->
  <div class="text-center">


   <form class="form-sr" method="POST" action="/login">
    <?php echo e(csrf_field()); ?>

    <h1 class="mb-2" style="color: #cc6600;">Login</h1>

    <label for="login " class="form-sr text-muted">Username or Email Address</label>

    <input type="text" id="login" name="login" class="form-control transition-fade" placeholder="Username or Email Address" required autofocus>

    <label for="password" class="form-sr text-muted">Password</label>

    <input type="password" id="password" name="password" class="form-control transition-fade" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block transition-fade mt-5" type="submit" style="background-color: #cc6600;">Sign in</button>

    <input type="button" class="btn btn-secondary mt-3 btn-outline-secondary" value="Register" onclick="window.location.href='../../register'" style="width: 100px"/>

  </form>

  <div style="position: absolute; bottom: 320px; right: 100px;">
    <?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>