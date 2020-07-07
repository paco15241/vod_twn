@extends('layouts.master')

@section('pageTitle', $video->title)

@section('content')
    <section class="video_list section">
        <div class="row jumbotron mt-md-5">

          <div class="col-md-3">
              @if(is_null($video->poster_url))
              <img class="card-img-top" src="https://dummyimage.com/185x264/aaa/fff&text=poster" alt="{{ $video->title }}" style="border-radius: 10px;">
              @else
              <img class="card-img-top" src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px;">
              @endif

              <h5 class="card-title text-muted">{{ $video->title }}（{{ $video->year }}）</h6>
          </div>

          <div class="col-md-9">
            <div class="info_link">
              @if($video->imdb_id)
                <a class="btn btn-outline-secondary"  target="_blank" title="IMDb" href="https://www.imdb.com/title/{{ $video->imdb_id }}">IMDb</a>
              @endif
                
              @if($video->atmovies_id)
                <a class="btn btn-outline-secondary"  target="_blank" title="開眼" href="http://www.atmovies.com.tw/movie/{{ $video->atmovies_id }}">開眼</a>
              @endif

              @if($video->douban_id)
                <a class="btn btn-outline-secondary"  target="_blank" title="豆瓣" href="https://movie.douban.com/subject/{{ $video->douban_id }}">豆瓣</a>
              @endif
            </div>
            
            <p class="mt-md-2">{{ $video->description }}</p>

            <p>{{ $video->description_en }}</p>
          </div>

        </div>

        <h2 class="is-medium">串流平台</h2>
        @foreach ($video->platforms as $platform)
          <a class="btn btn-outline-secondary" target="_blank" title="{{ $platform->vod_title }}" href="{{ $platform->vod_url }}">{{ $platform->platform_name }}</a>
        @endforeach

    </section>
@stop
