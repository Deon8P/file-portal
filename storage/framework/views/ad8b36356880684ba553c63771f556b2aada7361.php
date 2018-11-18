<div class="col-md-4">
  <div class="card mb-4 shadow-sm"style="background-color: lightgrey; border-radius: 4px; border-color: #cc6600;">   
    <div class="card-body transition" >
      <div class="">

        <?php if(strlen(str_replace('_', ' ', $file->name)) < 19): ?>
        <label class="h5 card-text" style="color: #ff8c1a" data-toggle="tooltip" data-placement="top" title="<?php echo e(str_replace('_', ' ', $file->name)); ?>"><?php echo e(str_replace('_', ' ', $file->name)); ?></label>
        <?php else: ?>
        <label class="h5 card-text" style="color: #ff8c1a" data-toggle="tooltip" data-placement="top" title="<?php echo e(str_replace('_', ' ', $file->name)); ?>"><?php echo e(substr_replace(str_replace('_', ' ', $file->name), '...', 16)); ?></label>
        <?php endif; ?>

        <label class="h5 card-text transition-fade" style="color: #1e2129">.<?php echo e($file->type); ?></label>

        <label class="card-text float-right transition-fade" style="color: #1e2129;">Version: <label class="card-text" style="color: #cc6600;"><?php echo e($file->version); ?></label></label><br>

        <i class="material-icons float-right ml-1 " style="text-shadow: 0px 0px 1px #cc6600;">visibility_off</i>
        <label class="card-text float-right" style="color: #cc6600;">Private</label><br>

        <small class="h6 card-text">Size: 
          <?php if(number_format((($file->byte_size / 1024) / 1024) / 1024, 2) > 0.00): ?>
          <label class="h6 card-text text-muted" ><?php echo e(number_format((($file->byte_size / 1024) / 1024) / 1024, 2)); ?> Gb </label>

          <?php elseif( number_format(($file->byte_size / 1024) / 1024, 2) > 0.00): ?>
          <label class="h6 card-text text-muted" ><?php echo e(number_format(($file->byte_size / 1024) / 1024, 2)); ?> Mb </label>

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

        <div class="d-flex justify-content-between align-items-center">

          <!-- file editing form -->

          <div class="btn-group">

            <!-- Opening the modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileEditModal<?php echo e(md5($file->id)); ?>">Update</button>

            <!-- Modal Header -->
            <div class="modal fade" id="fileEditModal<?php echo e(md5($file->id)); ?>" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel<?php echo e(md5($file->id)); ?>" aria-hidden="true">
              <div class="modal-dialog" role="dialog">
                <div class="modal-content" style="background: #1e2129">
                  <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel<?php echo e(md5($file->id)); ?>" style="color: #cc6600;">Update file</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="/files/<?php echo e($file->id); ?>/edit" method="POST" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                      <!-- File upload input-->
                      <div class="form-group">
                        <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Updated file:</h1>
                        <input type="file" id="file-upload" name="file-upload" style="background: #2a2d35; color: #cc6600">
                      </div>
                    </form>
                  </div>

                  <!-- Footer for uplaod button and close button-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Upload</button>
                  </div>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='/files/<?php echo e($file->id); ?>/download'">Download</a></button>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='/files/<?php echo e($file->id); ?>/delete'" >Remove</button>
          </div>

          <!-- Adding colaborators form -->
          <form action="/files/<?php echo e($file->id); ?>/addColaborators" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <button class="btn btn-sm btn-outline-secondary mt-3" style="color: #ff8c1a" data-toggle="modal" data-target="#addColaborators<?php echo e(md5($file->id)); ?>">Share</button>
            
            <!--Begining of modal dialog -->
            <div class="modal fade" id="addColaborators<?php echo e(md5($file->id)); ?>" tabindex="-1" role="dialog" aria-labelledby="addColaborators<?php echo e(md5($file->id)); ?>" aria-hidden="true">
              <div class="modal-dialog" role="dialog">
                <div class="modal-content" style="background: #1e2129">
                  <div class="modal-header">
                    <h5 class="modal-title " id="addColaborators<?php echo e(md5($file->id)); ?>" style="color: #cc6600;">Share with</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">

                    <!-- Colaborator name -->
                    <div class="form-group">
                      <h1 class="col-form-label" for="shared" style="color: #cc6600;">Colaborator Username</h1>
                      <input type="text" class="" id="username" name="username" style="width: 70%" required>
                    </div>
                  </div>

                  <!-- Footer for share button and close button-->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Share</button>
                  </div>
                </div>
              </div>
            </div>
            <!--End of modal -->
          </form>
        </div>   
      </div>
    </div>
  </div>
</div> 