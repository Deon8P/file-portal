<!-- Update file -->
<form action="/files/<?php echo e($file->id); ?>/updateFile" method="POST" enctype="multipart/form-data">
  <?php echo e(csrf_field()); ?>


  <!-- Modal Header -->
  <div class="modal fade" id="fileEditModal<?php echo e(md5($file->id)); ?>" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel<?php echo e(md5($file->id)); ?>" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
      <div class="modal-content" style="background: #1e2129">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel<?php echo e(md5($file->id)); ?>" style="color: #cc6600;">Update file:  <span class="text-muted"><?php echo e(str_replace('_', ' ', $file->name).'.'.$file->type); ?></span></h5>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <!-- File upload input-->
          <div class="form-group">
            <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Updated file:</h1>
            <input type="file" accept=".doc,.docx,.xlxs,.csv,.txt" id="file-upload" name="file-upload" style="background: #2a2d35; color: #cc6600" required>
            <br>
            <small class="text-muted">(Please make sure file names correspond.)</small>
        </div>

        </div>

        <!-- Footer for uplaod button and close button-->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Upload</button>

          <script>
              /*
            var zip = new JSZip();
            zip.file("Hello.txt", "Hello World\n");
            var img = zip.folder("images");
            img.file("smile.gif", imgData, {base64: true});
            zip.generateAsync({type:"blob"})
            .then(function(content) {
                // see FileSaver.js
                saveAs(content, "example.zip");
            });
        */
        </script>

        </div>
      </div>
    </div>
  </div>
</form>
