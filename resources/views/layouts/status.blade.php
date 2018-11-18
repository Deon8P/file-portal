<script>
	window.onload = function() {
        var successMessage = '{{Session::get('status')}}';
		var errorMessage = '{{Session::get('error')}}';
        var success = '{{Session::has('status')}}';
        var error = '{{Session::has('error')}}';
		var messageUser = '{{Session::get('message')}}';
        var message = '{{Session::has('message')}}';

		if(error){
            $("#error").html(errorMessage);
			$('#errorModal').modal('show');
        }
        if (success){
            $("#success").html(successMessage);
			$('#successModal').modal('show');
        }
        if(message)
        {
            $("#data").html(messageUser);
            $('#messageModal').modal('show');
            chat_ajax(messageUser);
        }
    }


</script>

<div class="modal fade " id="errorModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="dialog" >
      <div class="modal-content" style="background: #1e2129; border-color: red;">
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel" style="color: #cc6600;">
            <i class="material-icons mr-2" style="text-shadow: 0px 0px 1px #cc6600;">error_outline</i>
            Error!
          </h5>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <!-- File upload input-->
          <div class="form-group">
            <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Message:</h1>
            <small class="text-muted"><p id="error"></p></small>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="dialog" >
      <div class="modal-content" style="background: #1e2129; border-color: #60ca99;" >
        <div class="modal-header">
          <h5 class="modal-title" id="fileModalLabel" style="color: #cc6600;">
            <i class="material-icons mr-2" style="text-shadow: 0px 0px 1px #cc6600;">done_outline</i>
            Success!
          </h5>
          <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <!-- File upload input-->
          <div class="form-group">
            <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Message:</h1>
            <small class="text-muted"><p id="success"></p></small>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="dialog" >
          <div class="modal-content" style="background: #1e2129; border-color: #60ca99;" >
            <div class="modal-header">
              <h5 class="modal-title" id="messageModalLabel" style="color: #cc6600;">
                <i class="material-icons mr-2" style="text-shadow: 0px 0px 1px #cc6600;">done_outline</i>
                Success!
              </h5>
              <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <!-- File upload input-->
              <div class="form-group">
                <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Message:</h1>
                <small class="text-muted">Message has been sent to <label id="data" style="color: #cc6600;"></label>!</small>
              </div>

            </div>
          </div>
        </div>
      </div>

