<div class="col-md-4" >
  <div class="card mb-4 shadow-sm"style="background-color: lightgrey; border-radius: 4px; border-color: #cc6600;">
    <div class="card-body transition" >
      <div class="">

        <!-- Displaying the file name -->
        <?php echo $__env->make('files.naming', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <label class="card-text float-right transition-fade" style="color: #1e2129;">Version: <label class="card-text" style="color: #cc6600;"><?php echo e($file->version); ?></label></label><br><br>

        <i class="material-icons float-right ml-1" style="text-shadow: 0px 0px 1px #cc6600; border-bottom: 3px solid lightgrey; cursor: pointer;" onclick="location.href='/files/<?php echo e($file->id); ?>/makeShared'">visibility_off</i>
        <label class="card-text float-right" style="color: #cc6600;">Private</label>

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

       <?php echo $__env->make('files.collabList', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="d-flex justify-content-between align-items-center">

          <!-- file editing area -->
          <div class="btn-group">

            <!-- Opening the modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileEditModal<?php echo e(md5($file->id)); ?>">Update</button>

            <?php echo $__env->make('files.updateFile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Download" onclick="window.location.href='/files/<?php echo e($file->id); ?>/download'"><i class="material-icons">file_download</i></button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileDeleteModal<?php echo e(md5($file->id)); ?>" title="Remove" ><i class="material-icons">delete</i></button>
            <?php echo $__env->make('files.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
          <?php echo $__env->make('files.addCollaborator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
