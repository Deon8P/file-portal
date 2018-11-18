<!doctype html>
<html lang="en" style="height: 100%; position: absolute; left: 0%; right: 0%; top: 0%; bottom: 0%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="ITRW324 MVCProject">
    <meta name="author" content="Deon Pieterse">
    <link rel="icon" href="custom-images/Logo.png">

    <title>Document Portal</title>

    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>

    <!-- Bootstrap core CSS -->

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Custom styles for this template -->
    <?php echo $__env->yieldContent('style'); ?>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">


</head>

<?php echo $__env->yieldContent('nav'); ?>

<body style="overflow: auto; height: 100%">
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->yieldContent('footer-content'); ?>

</body>

<?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php echo $__env->yieldContent('scripts'); ?>

<script>
    /*
	function chat_ajax(){
		var req = new XMLHttpRequest();
		req.onreadystatechange = function() {
			if(req.readyState == 4 && req.status == 200){
			}
		}
		req.open('GET', '/get/messages', true);
		req.send();
    }
    setInterval(function(){chat_ajax()}, 5000)
    */
</script>

</html>
