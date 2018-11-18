<script>
	window.onload = function() {
        var successMessage = '<?php echo e(Session::get('status')); ?>';
		var errorMessage = '<?php echo e(Session::get('error')); ?>';
        var success = '<?php echo e(Session::has('status')); ?>';
        var error = '<?php echo e(Session::has('error')); ?>';

		if(error){
            $("#error").html(errorMessage);
			$('#errorModal').modal('show');
        }
        if (success){
            $("#success").html(successMessage);
			$('#successModal').modal('show');
        }
    }


</script>
<script>
        window.onload = function() {
            var chatMessage = '<?php echo e(Session::get('chat')); ?>';
            var chat = '<?php echo e(Session::has('chat')); ?>';
            if (chat){
                $("#chat").html(chatMessage);
                $('#chatModal').modal('show');
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

  <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="dialog" >
          <div class="modal-content" style="background: #1e2129; border-color: #60ca99;" >
            <div class="modal-header">
              <h5 class="modal-title" id="fileModalLabel" style="color: #cc6600;">
                <i class="material-icons mr-2" style="text-shadow: 0px 0px 1px #cc6600;">message</i>
                You recieved a message!
              </h5>
              <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

              <!-- File upload input-->
              <div class="form-group">
                <h1 for="file-upload" class="col-form-label" style="color: #cc6600;">Message:</h1>
                <small class="text-muted"><p id="chat"></p></small>
              </div>

            </div>
          </div>
        </div>
      </div>
