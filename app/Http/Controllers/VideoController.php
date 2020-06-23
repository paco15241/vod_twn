<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        // $videos = Video::with('platforms')->get();
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('index')->with(['videos' => $videos]);
    }

    public function create()
    {
        $video = new Video;
        return view('create')->with(['video' => $video]);
    }

    public function store(Request $request)
    {
        Video::create($request->only(['title','title_en','description','description_en','poster_url','imdb_id','atmovies_id','douban_id']));
        //Session::flash('flash_message', '資料已儲存');
        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        return view('show')->with(['video' => $video]);
    }

    public function edit(Video $video)
    {
        return view('edit')->with(['video' => $video]);
    }

    public function update(Request $request, Video $video)
    {
        $video->update($request->only(['title','title_en','description','description_en','poster_url','imdb_id','atmovies_id','douban_id']));
        //Session::flash('flash_message', '資料已更新');
        return redirect()->route('videos.edit', ['id' => $video->id]);
    }

    public function destroy(Video $video)
    {
        $video->delete();
        //Session::flash('flash_message', '資料已刪除');
        return redirect()->route('videos.index');
    }
}
