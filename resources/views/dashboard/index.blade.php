@extends('layouts.master')

@section('style')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section('nav')
@include('layouts.nav')
@endsection

@section('content')

<main role="main" style="background: #1e2129">
	<section class="text-center" style="background: #1e2129">
		<div class="container">
				<!-- File uploading form -->

					<div class="floating-div">
						<button type="button" class="floating-button" data-toggle="modal" for="fileUploadModal" data-target="#fileUploadModal" style="color: white; background: #cc6600; border-radius: 4px; cursor:pointer;">Upload a file <i class="material-icons float-right ml-1">file_upload</i></button>
					</div>

					<!--Begining of modal dialog -->
					<div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" name="fileUpload">
						<div class="modal-dialog" role="dialog">
							<div class="modal-content" style="background: #1e2129; border-color: #cc6600;">
								<div class="modal-header">
									<h5 class="modal-title " id="exampleModalLabel" style="color: #cc6600;">File Upload</h5>
									<button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
                                <form class="" action="/files/store" method="post" enctype="multipart/form-data">

								<div class="modal-body">
                                        {{ csrf_field() }}

										<!-- File upload input-->
										<div class="form-group">
											<h1 for="file-upload" class="col-form-label" style="color: #cc6600;">File:</h1>
											<input type="file" accept=".doc,.docx,.xlxs,.csv,.txt" id="file-upload" name="file-upload" style="background: #2a2d35; color: #cc6600" required>
										</div>

										<hr noshade style="background-color: #cc6600; height: 2px">

										<!-- File name -->
										<div class="form-group">
											<h1 class="col-form-label" for="shared" style="color: #cc6600;">Rename file:</h1>
											<input type="text" class="transition-fade" id="name" name="name" style="width: 70%;" placeholder="File name (optional)">
										</div>

                                        <hr noshade style="background-color: #cc6600; height: 2px">

                                        <div class="form-group">
                                                <h1 class="col-form-label" for="global" style="color: #cc6600;">Make Global:</h1>
                                                <input type="hidden" id="global" name="global" value="0" class="checkbox form-group" >
                                                <input type="checkbox" id="global" name="global" value="1" class="checkbox form-group">
                                                <br>
                                                <small class="text-muted"><label style="color:red">BE WARNED:</label> Once a file is made global it can not be undone!<br>
                                                Take care of sensitive content being globally shared!
                                                </small>
                                        </div>
								</div>

								<!-- Footer for upload button and close button-->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Upload</button>
								</div>
                            </form>
							</div>
						</div>
					</div>
                    <!--End of modal -->


                    <div class="floating-div-btn" style="position: absolute;">
						<button type="button" class="floating-button " data-toggle="modal" for="messageModal" data-target="#messageModal" style="color: white; border-radius: 4px; cursor:pointer; position: relative; top: 50%; right: 5%">Message<i class="material-icons float-right ml-1">message</i></button>
                    </div>

                    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true" name="fileUpload">
                            <div class="modal-dialog" role="dialog">
                                <div class="modal-content" style="background: #1e2129; border-color: #cc6600;">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="messageModalLabel" style="color: #cc6600;">Send a message</h5>
                                        <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color: white">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="" action="/chats/send/message" method="post" enctype="multipart/form-data">

                                    <div class="modal-body">
                                            {{ csrf_field() }}

                                            <!-- File upload input-->
                                            <div class="form-group">
                                                <h1 for="username" class="col-form-label" style="color: #cc6600;">Recipient Username:</h1>
                                                <input type="text" id="username" name="username" style="background: #2a2d35; color: #cc6600" required>
                                            </div>

                                            <hr noshade style="background-color: #cc6600; height: 2px">

                                            <!-- File name -->
                                            <div class="form-group">
                                                <h1 class="col-form-label" for="message" style="color: #cc6600;">Your message:</h1>
                                                <textarea type="textarea" class="transition-fade" id="message" name="message" style="width: 70%;" placeholder="Type a message..." required></textarea>
                                            </div>

                                    </div>

                                    <!-- Footer for upload button and close button-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary transition-fade" style="color: white; background-color: #cc6600">Send</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
		</div>

	</section>

	<!-- Filter Options -->
	@include('files.fileFilter')
	<!-- end of Filter Options -->


    <!-- Displays all the files that the user has -->
    <div >
        @include('files.showAllFiles')
    </div>

</main>

@endsection

@section('scripts')

@endsection

