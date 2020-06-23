<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        
        $video_id = $request->input('video_id', NULL);
        if(!$video_id)
        {
            //Session::flash('flash_message', '無法對應影片');
            return redirect()->back();
        }
            
        $platform = new Platform;
        return view('platforms.create')->with(['platform' => $platform, 'video_id' => $video_id]);
    }

    public function store(Request $request)
    {
        $video_id = $request->input('video_id');
        Platform::create($request->only(['video_id','platform_name','title','description','page_url','provider','on_at','off_at']));
        //Session::flash('flash_message', '資料已儲存');
        return redirect()->route('videos.edit', ['id' => $video_id]);
    }

    public function show(Platform $platform)
    {
        //
    }

    public function edit(Request $request, Platform $platform)
    {
        $video_id = $platform->video_id;

        return view('platforms.edit')->with(['platform' => $platform, 'video_id' => $video_id]);
    }

    public function update(Request $request, Platform $platform)
    {
        $video_id = $platform->video_id;
        $platform->update($request->only(['video_id','platform_name','title','description','page_url','provider','on_at','off_at']));
        //Session::flash('flash_message', '資料已更新');
        return redirect()->route('videos.edit', ['id' => $video_id]);
    }

    public function destroy(Platform $platform)
    {
        $video_id = $platform->video_id;
        $platform->delete();
        //Session::flash('flash_message', '資料已刪除');
        return redirect()->route('videos.edit', ['id' => $video_id]);
    }
}
