<ul>
    @foreach($videos as $video)
        <li>
            <h2>{{ $video->title }}</h2><a href="{{route('video.edit',$video->id)}}"><button>edit</button></a><a href="{{route('video.delete',$video->id)}}"><button>delete</button></a>
            <video src="{{ asset('public/storage/'.$video->video) }}" controls></video>
        </li>
    @endforeach
</ul>

<a href="{{ route('/') }}">Upload Video</a>