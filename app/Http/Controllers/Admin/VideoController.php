<?php

namespace App\Http\Controllers\Admin;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', NULL);
        $type    = $request->input('type', NULL);

        switch ($type) {
            case 'all':
                if(!$keyword) {
                    $videos = Video::orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
                } else {
                    $videos = Video::where('title', 'like', "%$keyword%")->orWhere('title_en', 'like', "%$keyword%")->paginate(18)->onEachSide(3);
                }
                break;
            case 'unpublished':
                if(!$keyword) {
                    $videos = Video::where('status', 0)->orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
                } else {
                    $videos = Video::where(function ($query) use ($keyword) {
                        $query->where('title', 'like', "%$keyword%")
                              ->orWhere('title_en', 'like', "%$keyword%");
                    })->where('status', 0)->paginate(18)->onEachSide(3);
                }
                break;
            case 'published':
                if(!$keyword) {
                    $videos = Video::where('status', 1)->orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
                } else {
                    $videos = Video::where(function ($query) use ($keyword) {
                        $query->where('title', 'like', "%$keyword%")
                              ->orWhere('title_en', 'like', "%$keyword%");
                    })->where('status', 1)->paginate(18)->onEachSide(3);
                }
                break;    
            default:
                $videos = Video::orderBy('created_at', 'desc')->paginate(18)->onEachSide(3);
                break;
        }

        return view('admin.videos.index')->with(['videos' => $videos, 'type' => $type, 'keyword' => $keyword]);
    }

    public function create()
    {
        $video = new Video;
        return view('admin.videos.create')->with(['video' => $video]);
    }

    public function store(Request $request)
    {
        Video::create($request->only(['title','title_en','description','description_en','year','poster_url','imdb_id','atmovies_id','douban_id','status']));
        flash('資料已儲存')->success()->important();
        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        //
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit')->with(['video' => $video]);
    }

    public function update(Request $request, Video $video)
    {
        if($request->get('status') == null){
            $status = 0;
        } else {
            $status = 1;
        }
        
        $video->update($request->only(['title','title_en','description','description_en','year','poster_url','imdb_id','atmovies_id','douban_id']) + ['status' => $status]);

        flash('資料已更新')->success()->important();
        return redirect()->route('admin.videos.edit', ['id' => $video->id]);
    }

    public function destroy(Video $video)
    {
        $video->delete();
        flash('資料已刪除')->success()->important();
        return redirect()->route('admin.videos.index');
    }
}
