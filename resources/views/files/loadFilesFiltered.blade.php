@if($privateFiles)
            @foreach($privateFiles as $file)
			@include('files.type.private')
            @endforeach
			@endif

			@if($sharedFiles)
            @foreach($sharedFiles as $file)
			@include('files.type.shared')
            @endforeach
			@endif

			@if($collabFiles)
            @foreach($collabFiles as $file)
			@include('files.type.collabing')
            @endforeach
            @endif

            @if($globalFiles)
            @foreach($globalFiles as $file)
			@include('files.type.global')
            @endforeach
            @endif
