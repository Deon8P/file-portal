<!doctype html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ITRW324 MVCProject">
    <meta name="author" content="Deon Pieterse">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Wordable</title>

    <!-- Bootstrap core CSS -->

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <!-- Custom styles for this template -->
    <?php echo $__env->yieldContent('style'); ?>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">



</head>

<body style="height: 100%">
    <?php echo $__env->yieldContent('content'); ?>
    
    <?php echo $__env->yieldContent('footer-content'); ?>

</body>

<?php echo $__env->make('layouts.status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</html>