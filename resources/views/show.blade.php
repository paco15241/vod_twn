@extends('layouts.master')

@section('pageTitle', $video->title)

@section('content')
    <section class="video_list section">
      <section class="container">
        <div class="columns is-multiline">

          <div class="column is-2">
            <div class="card product-item is-shadowless">
              <div class="card-image">
                <figure class="image">
                  @if(is_null($video->poster_url))
                  <img src="https://dummyimage.com/185x264/aaa/fff&text=poster" alt="{{ $video->title }}" style="border-radius: 10px;">
                  @else
                  <img src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px;">
                  @endif
                </figure>
              </div>
              <div class="card-content">
                <div class="content">
                  <h4 class="is-size-6 has-text-centered">{{ $video->title }}（{{ $video->year }}）</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="column is-10">
            <p>{{ $video->description }}</p>

            <div class="info_link">
              @if($video->imdb_id)
                <a class="button"  target="_blank" title="IMDb" href="https://www.imdb.com/title/{{ $video->imdb_id }}">IMDb</a>
                @endif
                
                @if($video->atmovies_id)
                <a class="button"  target="_blank" title="開眼" href="http://www.atmovies.com.tw/movie/{{ $video->atmovies_id }}">開眼</a>
                @endif

                @if($video->douban_id)
                <a class="button"  target="_blank" title="豆瓣" href="https://movie.douban.com/subject/{{ $video->douban_id }}">豆瓣</a>
                @endif
            </div>

          </div>


          <h2 class="is-medium">串流平台</h2>
          @foreach ($video->platforms as $platform)
            <a class="button" target="_blank" title="{{ $platform->vod_title }}" href="{{ $platform->vod_url }}">{{ $platform->platform_name }}</a>
          @endforeach

        </div>
      </section>
    </section>
@stop
