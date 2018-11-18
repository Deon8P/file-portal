
<div class="py-5" id="showFiles" style="position: absolute; top:8%; left: 1%; right: 80%; height: 90%; width: 62%; border-left: 2px solid #cc6600; border-radius: 15px">
        <h4 class="text-muted pl-3" >Files:</h4>
        <hr noshade class="float-left pl-5" style="background-color: #cc6600; height: 2px; width: 40%">
        <br>
        <br>
	<div class="container" style="overflow-y: auto; height: 90%; ">
		<div class="row">

            <?php if(is_array($privateFiles) || is_array($sharedFiles) || is_array($collabFiles)): ?>

            <?php echo $__env->make('files.loadFilesFiltered', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php elseif($privateFiles->isEmpty() && $sharedFiles->isEmpty() && $collabFiles->isEmpty()): ?>

                <h1 class="text-muted pl-2">You have no files yet, <br><a data-target="#fileUploadModal" data-toggle="modal" href="#fileUploadModal">why not upload some?</a></h1>

            <?php else: ?>

            <?php echo $__env->make('files.loadFilesFiltered', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php endif; ?>

		</div>
	</div>
</div>
