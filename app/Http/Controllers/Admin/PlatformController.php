<?php

namespace App\Http\Controllers\Admin;

use App\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreatePlatformRequest;
use App\Http\Controllers\Controller;

class PlatformController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        
        $video_id = $request->input('video_id', NULL);
        if(!$video_id)
        {
            flash('無法對應影片')->error()->important();
            return redirect()->back();
        }
            
        $platform = new Platform;
        return view('admin.platforms.create')->with(['platform' => $platform, 'video_id' => $video_id]);
    }

    public function store(CreatePlatformRequest $request)
    {
        $video_id = $request->input('video_id');
        Platform::create($request->only(['video_id','platform_name','vod_id','vod_title','vod_description','vod_url','vod_provider','on_at','off_at','status']));

        flash('資料已儲存')->success()->important();
        return redirect()->route('admin.videos.edit', ['id' => $video_id]);
    }

    public function show(Platform $platform)
    {
        //
    }

    public function edit(Request $request, Platform $platform)
    {
        $video_id = $platform->video_id;

        return view('admin.platforms.edit')->with(['platform' => $platform, 'video_id' => $video_id]);
    }

    public function update(CreatePlatformRequest $request, Platform $platform)
    {
        $video_id = $platform->video_id;
        
        if($request->get('status') == null){
            $status = 0;
        } else {
            $status = 1;
        }
        
        $platform->update($request->only(['video_id','platform_name','vod_id','vod_title','vod_description','vod_url','vod_provider','on_at','off_at']) + ['status' => $status]);
        flash('資料已更新')->success()->important();
        return redirect()->route('admin.videos.edit', ['id' => $video_id]);
    }

    public function destroy(Platform $platform)
    {
        $video_id = $platform->video_id;
        $platform->delete();
        flash('資料已刪除')->success()->important();
        return redirect()->route('admin.videos.edit', ['id' => $video_id]);
    }
}
