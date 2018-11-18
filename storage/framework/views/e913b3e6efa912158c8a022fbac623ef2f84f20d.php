<?php $__env->startSection('style'); ?>
<link href="/css/login.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="text-center">

		<h1 style="color: #cc6600;">Register</h1>

		<form class="form-sr" method="POST" action="/register">
			<?php echo e(csrf_field()); ?>

			<div class="form-sr">
				<label for="username" class="text-muted">Username</label>
				<input type="text" class="form-control transition-fade" id="username" name="username" placeholder="Username" required>
			</div>

			<div class="form-sr">
				<label for="email " class="text-muted">Email address</label>
				<input type="email" class="form-control transition-fade" id="email" name="email" placeholder="Email address" required>
			</div>

			<div class="form-sr">
				<label for="password " class="text-muted">Password</label>
				<input type="password" class="form-control transition-fade" id="password" name="password" placeholder="Password" required>
			</div>

			<div class="form-sr">
				<label for="password_confirmation " class="text-muted">Password confirmation</label>
				<input type="password" class="form-control transition-fade" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation" required>
			</div>

			<div class="form-sr">
				<button type="submit" class="btn btn-primary btn-lg transition-fade text-light btn-block mt-3" style="background-color: #cc6600;"><strong>Register</strong></button>
				<input type="button" class="btn btn-secondary mt-3 btn-outline-secondary" value="Back" onclick="window.location.href='../../login'" style="width: 100px"/>
			</div>

			<div style="position: absolute; bottom: 320px; right: 200px;">
				<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>