@if(! $collaborations->where('file_id', $file->id)->isEmpty())



          <br>

          <a href style="color: #ff8c1a;" data-toggle="modal" data-target="#removeCollaborators{{md5($file->id)}}">Shared with ... <i class="material-icons ml-1 " style="text-shadow: 0px 0px 1px #cc6600;cursor: pointer;">fingerprint</i></a>

          <!--Begining of modal dialog -->
          <div class="modal fade" id="removeCollaborators{{md5($file->id)}}" tabindex="-1" role="dialog" aria-labelledby="removeCollaborators{{md5($file->id)}}" aria-hidden="true">
            <div class="modal-dialog" role="dialog">
              <div class="modal-content" style="background: #1e2129">
                <div class="modal-header">
                  <h5 class="modal-title " id="removeCollaborators{{md5($file->id)}}" style="color: #cc6600;">Shared with ...</h5>
                  <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                  <!-- Collaborators -->
                  <div class="form-group">

                    <h1 class="col-form-label" style="color: #cc6600;">Collaborators</h1>

                    <ul>
                      @foreach($collaborations->where('file_id', $file->id) as $collaborator)
                      <form action="/files/{{ $file->id }}/removeCollaborators" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input hidden id="{{ $collaborator->collaborator_username }}Collaborator" name="username" value="{{ $collaborator->collaborator_username }}">
                        <li style="color: white;">{{$collaborator->collaborator_username}} <button class="btn-outline-secondary float-right" data-toggle="tooltip" data-placement="top" title="Remove Collaborator" type="submit"> <i class="material-icons transition" style="text-shadow: 0px 0px 1px #cc6600; color: #cc6600; cursor: pointer;" >remove</i></button></li>
                        <br>
                    </form>
                      @endforeach
                    </ul>

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
        @endif
