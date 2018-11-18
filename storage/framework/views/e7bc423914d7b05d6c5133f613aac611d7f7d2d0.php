<script>
	window.onload = function() {
		var message = '<?php echo e(Session::get('status')); ?>';
		var exist = '<?php echo e(Session::has('status')); ?>';
		if(exist){
			alert(message);
		}
	}
</script>

