<div class="col-md-4">
  <div class="card mb-4 shadow-sm"style="background-color: lightgrey; border-radius: 4px; border-color: #cc6600;">
    <div class="card-body transition" >
      <div class="">

        <!-- Displaying the file name -->
        <?php echo $__env->make('files.naming', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <label class="card-text float-right transition-fade" style="color: #1e2129;">Version: <label class="card-text" style="color: #cc6600;"><?php echo e($file->version); ?></label></label><br><br>

        <i class="material-icons float-right ml-1 " style="text-shadow: 0px 0px 1px #cc6600;">visibility</i>
        <label class="card-text float-right" style="color: #cc6600;">Shared</label>

        <small class="h6 card-text">Size:
          <?php if(number_format((($file->byte_size / 1024) / 1024) / 1024, 2) > 0.00): ?>
          <label class="h6 card-text text-muted" ><?php echo e(number_format((($file->byte_size / 1024) / 1024) / 1024, 2)); ?> Gb</label>

          <?php elseif( number_format(($file->byte_size / 1024) / 1024, 2) > 0.00): ?>
          <label class="h6 card-text text-muted" ><?php echo e(number_format(($file->byte_size / 1024) / 1024, 2)); ?> Mb</label>

          <?php elseif( number_format(($file->byte_size / 1024), 2) > 0.00): ?>
          <label class="h6 card-text text-muted" ><?php echo e(number_format(($file->byte_size / 1024), 2)); ?> Kb</label>

          <?php else: ?>
          <label class="h6 card-text text-muted" ><?php echo e($file->byte_size); ?> B</label>

          <?php endif; ?>
        </small><br><br>

        <small class="card-text" >Owner: <a href="<?php echo e($file->owner_username); ?>" style="color: #ff8c1a"><?php echo e($file->owner_username); ?></a></small>
        <hr style="color: #1e2129; box-shadow: 0px 0px 1px #1e2129;">

        <small class="h6 card-text" >Updated: <label class="text-muted"><?php echo e(date('Y-m-d h:i', strtotime($file->updated_at))); ?></label></small><br>
        <small class="h6 card-text" ><label class="text-muted"><?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($file->updated_at))->diffForHumans()); ?></label></small><br>

        <small class="card-text" >By: <a href="<?php echo e($file->last_uploader_username); ?>" style="color: #ff8c1a"><?php echo e($file->last_uploader_username); ?></a></small>


        <form action="/files/<?php echo e($file->id); ?>/removeCollaborators" method="POST" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>


          <br>

          <a href style="color: #ff8c1a;" data-toggle="modal" data-target="#removeCollaborators<?php echo e(md5($file->id)); ?>">Shared with ...</a>

          <!--Begining of modal dialog -->
          <div class="modal fade" id="removeCollaborators<?php echo e(md5($file->id)); ?>" tabindex="-1" role="dialog" aria-labelledby="removeCollaborators<?php echo e(md5($file->id)); ?>" aria-hidden="true">
            <div class="modal-dialog" role="dialog">
              <div class="modal-content" style="background: #1e2129">
                <div class="modal-header">
                  <h5 class="modal-title " id="removeCollaborators<?php echo e(md5($file->id)); ?>" style="color: #cc6600;">Shared with ...</h5>
                  <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                  <!-- Collaborators -->
                  <div class="form-group">

                    <?php if(count(explode(",",$file->collaborators)) > 1): ?>
                    <h1 class="col-form-label" style="color: #cc6600;">Collaborators</h1>

                    <ul>
                      <?php $__currentLoopData = explode(",",$file->collaborators); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collaborator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <?php if(strlen($collaborator) > 2): ?>

                      <li style="color: white;"><?php echo e($collaborator); ?></li>

                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <?php else: ?>
                    <h1 class="col-form-label" style="color: white;">This file has no collaborators.</h1>
                    <?php endif; ?>

                  </div>
                </div>

                <!-- Footer for uplaod button and close button-->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!--<button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Share</button>-->
                </div>
              </div>
            </div>
          </div>
          <!--End of modal -->
        </form>

        <div class="d-flex justify-content-between align-items-center">

          <!-- file editing area -->

          <div class="btn-group">

            <!-- Opening the modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileEditModal<?php echo e(md5($file->id)); ?>">Update</button>

            <?php echo $__env->make('files.updateFile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Download" onclick="window.location.href='/files/<?php echo e($file->id); ?>/download'"><i class="material-icons">file_download</i></button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Remove" onclick="window.location.href='/files/<?php echo e($file->id); ?>/delete'" ><i class="material-icons">delete</i></button>
          </div>
            <?php echo $__env->make('files.addCollaborator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
