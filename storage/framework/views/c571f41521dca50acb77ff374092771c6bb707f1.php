<div class=" speech-bubble-recieved float-left text-center" style="width: 40%">
        <h4 class=""><?php echo e($message->from_user); ?>: </h4>
        <p class=""><?php echo e($message->message); ?></p>
        <small class="h6 card-text float-left" >Sent at: <label class="text-muted"><?php echo e(date('Y-m-d h:i', strtotime($message->created_at))); ?></label></small>

    <small class="h6 card-text float-right"><label class="text-muted"><?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans()); ?></label>
        </small>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

