<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        // $videos = Video::with('platforms')->get();
        $videos = Video::where('status', 1)->orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
        return view('videos.index')->with(['videos' => $videos]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Video $video)
    {
        return view('videos.show')->with(['video' => $video]);
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(Request $request, Video $video)
    {
        //
    }

    public function destroy(Video $video)
    {
        //
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword', NULL);

        if(!$keyword)
        {
            $results = Video::where('id', NULL)->where('status', 1)->paginate(18)->onEachSide(3);
            return view('videos.search')->with(['keyword' => '', 'results' => $results]);
        }

        $results = Video::where('title', 'like', "%$keyword%")->orWhere('title_en', 'like', "%$keyword%")->where('status', 1)->paginate(18)->onEachSide(3);
        return view('videos.search')->with(['keyword' => $keyword, 'results' => $results]);
    }
}
