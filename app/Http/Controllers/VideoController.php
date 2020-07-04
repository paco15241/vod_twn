<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        // $videos = Video::with('platforms')->get();
        $videos = Video::orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
        return view('videos.index')->with(['videos' => $videos]);
    }

    public function admin()
    {
        
        return 'test';
    }

    public function create()
    {
        $video = new Video;
        return view('videos.create')->with(['video' => $video]);
    }

    public function store(Request $request)
    {
        Video::create($request->only(['title','title_en','description','description_en','year','poster_url','imdb_id','atmovies_id','douban_id','status']));
        //Session::flash('flash_message', '資料已儲存');
        return redirect()->route('videos.index');
    }

    public function show(Video $video)
    {
        return view('videos.show')->with(['video' => $video]);
    }

    public function edit(Video $video)
    {
        return view('videos.edit')->with(['video' => $video]);
    }

    public function update(Request $request, Video $video)
    {
        if($request->get('status') == null){
            $status = 0;
        } else {
            $status = 1;
        }
        
        $video->update($request->only(['title','title_en','description','description_en','year','poster_url','imdb_id','atmovies_id','douban_id']) + ['status' => $status]);

        //Session::flash('flash_message', '資料已更新');
        return redirect()->route('videos.edit', ['id' => $video->id]);
    }

    public function destroy(Video $video)
    {
        $video->delete();
        //Session::flash('flash_message', '資料已刪除');
        return redirect()->route('videos.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword', NULL);

        if(!$keyword)
        {
            $results = Video::where('id', NULL)->paginate(18)->onEachSide(3);
            return view('videos.search')->with(['keyword' => '', 'results' => $results]);
        }

        $results = Video::where('title', 'like', "%$keyword%")->orWhere('title_en', 'like', "%$keyword%")->paginate(18)->onEachSide(3);
        return view('videos.search')->with(['keyword' => $keyword, 'results' => $results]);
    }
}
