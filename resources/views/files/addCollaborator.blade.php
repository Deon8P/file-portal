<!-- Adding collaborators form -->
<form action="/files/{{ $file->id }}/addCollaborators" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

  <button class="btn btn-sm btn-outline-secondary" style="color: #ff8c1a" data-toggle="modal" data-target="#addCollaborators{{md5($file->id)}}">Share <i class="material-icons float-right ml-2">person_add</i></button>

  <!--Begining of modal dialog -->
  <div class="modal fade" id="addCollaborators{{md5($file->id)}}" tabindex="-1" role="dialog" aria-labelledby="addCollaborators{{md5($file->id)}}" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
      <div class="modal-content" style="background: #1e2129">
        <div class="modal-header">
          <h5 class="modal-title " id="addCollaborators{{md5($file->id)}}" style="color: #cc6600;">Share with</h5>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <!-- Collaborator name -->
          <div class="form-group">
            <h1 class="col-form-label" for="shared" style="color: #cc6600;">Collaborator Username</h1>
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
