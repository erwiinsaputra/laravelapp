<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('video.index', compact('videos'));
    }

    public function create()
    {
        return view('video.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:102400'
        ]);

        #var_dump($validated['title']);
        $video = new Video;
        $video->title = $validated['title'];
        $video->description = $validated['description'];
        $video->video = $request->file('video')->store('videos', 'public');
        $video->save();

        return redirect()->route('video.index')->with('success', 'Video has been uploaded.');
    }

    public function show(Video $video)
    {
        return view('video.show', compact('video'));
    }

    public function edit($id)
    {
        $route=Route::currentRouteName();
        $video=Video::find($id);
        return view('video.create', compact('video','route'));
    }

    public function update(Request $request, $id)
    {
        $video=Video::find($id);
        $video->title = $request['title'];
        $video->description = $request['description'];
        // $video->video = $request->file('video')->store('videos', 'public');
        $video->save();

        return redirect()->route('video.index')->with('success', 'Video has been updated.');
        // return view('video.update', compact('video','route'));
    }

    public function delete($id)
    {
        $video=Video::find($id);
        Storage::delete($video->video);
        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video has been deleted.');
        // return view('video.update', compact('video','route'));
    }
}
