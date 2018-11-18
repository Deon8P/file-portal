<?php $__env->startSection('style'); ?>
<link href="/css/login.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
<div class="text-center">
  <form class="form-sr">
    <!--<img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="pt-3"><a href="../../register">Register</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
  </form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>