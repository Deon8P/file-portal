<script>
	var message = '<?php echo e(Session::get('alert')); ?>';
	var exist = '<?php echo e(Session::has('alert')); ?>';
	if(exist){
		alert(message);
	}
</script>