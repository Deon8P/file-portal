<?php $__env->startSection('style'); ?>
<link href="/css/dashboard.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main role="main" style="background: #1e2129">
	<section class="text-center" style="background: #1e2129">
		<div class="container">
				<!-- File uploading form -->

					<div class="floating-div">
						<button type="button" class="floating-button" data-toggle="modal" for="fileUploadModal" data-target="#fileUploadModal" style="color: white; background: #cc6600; border-radius: 4px; cursor:pointer;">Upload a file <i class="material-icons float-right ml-1">file_upload</i></button>
					</div>

					<!--Begining of modal dialog -->
					<div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" name="fileUpload">
						<div class="modal-dialog" role="dialog">
							<div class="modal-content" style="background: #1e2129; border-color: #cc6600;">
								<div class="modal-header">
									<h5 class="modal-title " id="exampleModalLabel" style="color: #cc6600;">File Upload</h5>
									<button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
                                <form class="" action="/files/store" method="post" enctype="multipart/form-data">

								<div class="modal-body">
                                        <?php echo e(csrf_field()); ?>


										<!-- File upload input-->
										<div class="form-group">
											<h1 for="file-upload" class="col-form-label" style="color: #cc6600;">File:</h1>
											<input type="file" accept=".doc,.docx,.xlxs,.csv,.txt" id="file-upload" name="file-upload" style="background: #2a2d35; color: #cc6600" required>
										</div>

										<hr noshade style="background-color: #cc6600; height: 2px">

										<!-- File name -->
										<div class="form-group">
											<h1 class="col-form-label" for="shared" style="color: #cc6600;">Rename file:</h1>
											<input type="text" class="transition-fade" id="name" name="name" style="width: 70%;" placeholder="File name (optional)">
										</div>

										<hr noshade style="background-color: #cc6600; height: 2px">

								</div>

								<!-- Footer for upload button and close button-->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" onclick="loadFiles()" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Upload</button>
								</div>
                            </form>
							</div>
						</div>
					</div>
                    <!--End of modal -->


                    <div class="floating-div-btn" style="position: absolute;">
						<button type="button" class="floating-button " onclick="location.href='/chats'" style="color: white; border-radius: 4px; cursor:pointer; position: relative; top: 50%; right: 5%">Message<i class="material-icons float-right ml-1">message</i></button>
					</div>
		</div>

	</section>

	<!-- Filter Options -->
	<?php echo $__env->make('files.fileFilter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- end of Filter Options -->


    <!-- Displays all the files that the user has -->
    <div >

        <?php echo $__env->make('files.showAllFiles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>


</main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>