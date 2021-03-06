<div class="modal fade" id="fileDeleteModal{{md5($file->id)}}" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel{{md5($file->id)}}" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content" style="background: #1e2129; border-color: orange;">
                <div class="modal-header">
                        <h5 class="modal-title" id="fileModalLabel{{md5($file->id)}}" style="color: #cc6600;">
                          <i class="material-icons mr-2" style="text-shadow: 0px 0px 1px #cc6600;">warning</i>
                          Are you sure?
                        </h5>
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">

                        <div class="form-group">
                          <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Message:</h1>
                          <small class="text-muted"><p id="message">Are you sure you want to delete the file: <p style="color: #cc6600;">{{ $file->name.'.'.$file->type }}</p></p></small>
                        </div>
                      </div>

            <!-- Footer for delete button and close button-->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600" onclick="window.location.href='/files/{{ $file->id }}/delete'">Delete</button>
            </div>
          </div>
        </div>
      </div>

