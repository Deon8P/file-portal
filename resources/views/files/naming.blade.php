<span class="float-left transition-fade" id="FileName{{md5($file->id)}}" data-toggle="modal" data-target="#updateFileName{{md5($file->id)}}{{md5($file->name)}}">

	@if(strlen(str_replace('_', ' ', $file->name)) < 15)

	<label class="h5 card-text pl-1 pr-1" style="color: #ff8c1a; border-bottom: 3px solid lightgrey; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{str_replace('_', ' ', $file->name)}}">{{str_replace('_', ' ', $file->name)}}</label>

	@else

	<label class="h5 card-text pl-1 pr-1" style="color: #ff8c1a; border-bottom: 3px solid lightgrey; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="{{str_replace('_', ' ', $file->name)}}">{{substr_replace(str_replace('_', ' ', $file->name), '...', 9)}}</label>

	@endif

	<!-- Display the file type -->
	<label class="h5 card-text" style="color: #1e2129">.{{$file->type}}</label>
</span>

@if($file->owner_username == Auth::user()->username)

<form action="/files/{{ $file->id }}/updateFileName" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<!--Begining of modal dialog -->
	<div class="modal fade" id="updateFileName{{md5($file->id)}}{{md5($file->name)}}" tabindex="-1" role="dialog" aria-labelledby="updateFileName{{md5($file->id)}}{{md5($file->name)}}" aria-hidden="true">
		<div class="modal-dialog" role="dialog">
			<div class="modal-content" style="background: #1e2129">
				<div class="modal-header">
					<h5 class="modal-title " id="updateFileName{{md5($file->id)}}{{md5($file->name)}}" style="color: #cc6600;">Edit file name</h5>
					<button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<!-- New file name -->
					<div class="form-group">
						<h1 class="col-form-label" for="shared" style="color: #cc6600;">New file name</h1>
						<input type="text" class="" id="new-file-name" name="new-file-name" style="width: 70%" placeholder="{{ $file->name }}" required>
					</div>
				</div>

				<!-- Footer for share button and close button-->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Change</button>
				</div>
			</div>
		</div>
	</div>
	<!--End of modal -->
</form>

@else

<script type="text/javascript">
	var element = document.getElementById("FileName{{md5($file->id)}}");
	element.classList.remove("transition-fade");
	element.classList.add("shake");
</script>
@endif
