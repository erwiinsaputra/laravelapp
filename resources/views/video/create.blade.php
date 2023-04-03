@if(@$route)

<form action="{{ route('video.update', $video->id) }}" method="post" enctype="multipart/form-data">
  
    @method('put')
    @else

<form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
    @endif

@csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $video->title ?? ''}}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" required>{{ $video->description ?? '' }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="video">Video</label>
        <input type="file" name="video" id="video" class="form-control-file @error('video') is-invalid @enderror">
        @error('video')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
<a href="{{ route('video.index') }}"><button type="button" >List Video</button></a>
