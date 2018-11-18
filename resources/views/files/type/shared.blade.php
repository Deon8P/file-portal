<div class="col-md-4">
  <div class="card mb-4 shadow-sm"style="background-color: lightgrey; border-radius: 4px; border-color: #cc6600;">
    <div class="card-body transition" >
      <div class="">

        <!-- Displaying the file name -->
        @include('files.naming')

        <label class="card-text float-right transition-fade" style="color: #1e2129;">Version: <label class="card-text" style="color: #cc6600;">{{$file->version}}</label></label><br><br>

        <i class="material-icons float-right ml-1 " style="text-shadow: 0px 0px 1px #cc6600; border-bottom: 3px solid lightgrey; cursor: pointer;" onclick="location.href='/files/{{ $file->id }}/makePrivate'">visibility</i>
        <label class="card-text float-right" style="color: #cc6600;">Shared</label>

        <small class="h6 card-text">Size:
          @if(number_format((($file->byte_size / 1024) / 1024) / 1024, 2) > 0.00)
          <label class="h6 card-text text-muted" >{{number_format((($file->byte_size / 1024) / 1024) / 1024, 2)}} Gb</label>

          @elseif( number_format(($file->byte_size / 1024) / 1024, 2) > 0.00)
          <label class="h6 card-text text-muted" >{{number_format(($file->byte_size / 1024) / 1024, 2)}} Mb</label>

          @elseif( number_format(($file->byte_size / 1024), 2) > 0.00)
          <label class="h6 card-text text-muted" >{{number_format(($file->byte_size / 1024), 2)}} Kb</label>

          @else
          <label class="h6 card-text text-muted" >{{$file->byte_size}} B</label>

          @endif
        </small><br><br>

        <small class="card-text" >Owner: <a data-target="#messageModal" data-toggle="modal" style="color: #ff8c1a; cursor: pointer;">{{ $file->owner_username }}</a></small>
        <hr style="color: #1e2129; box-shadow: 0px 0px 1px #1e2129;">

        <small class="h6 card-text" >Updated: <label class="text-muted">{{ date('Y-m-d h:i', strtotime($file->updated_at)) }}</label></small><br>
        <small class="h6 card-text" ><label class="text-muted">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($file->updated_at))->diffForHumans() }}</label></small><br>

        <small class="card-text" >By: <a data-target="#messageModal" data-toggle="modal" style="color: #ff8c1a; cursor: pointer;">{{ $file->last_uploader_username }}</a></small>

        @include('files.collabList')


        <div class="d-flex justify-content-between align-items-center">

          <!-- file editing area -->

          <div class="btn-group">

            <!-- Opening the modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileEditModal{{md5($file->id)}}">Update</button>

            @include('files.updateFile')

            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="Download" onclick="window.location.href='/files/{{ $file->id }}/download'"><i class="material-icons">file_download</i></button>
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#fileDeleteModal{{ md5($file->id) }}" title="Remove"><i class="material-icons">delete</i></button>
            @include('files.delete')
        </div>
            @include('files.addCollaborator')
        </div>
      </div>
    </div>
  </div>
</div>
