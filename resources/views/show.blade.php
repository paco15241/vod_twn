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
                  <img src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px;">
                </figure>
              </div>
              <div class="card-content">
                <div class="content">
                  <h4 class="is-size-6">{{ $video->title }}</h4>
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
                <a class="button"  target="_blank" title="IMDb" href="http://www.atmovies.com.tw/movie/{{ $video->atmovies_id }}">開眼</a>
                @endif

                @if($video->douban_id)
                <a class="button"  target="_blank" title="IMDb" href="https://movie.douban.com/subject/{{ $video->douban_id }}">豆瓣</a>
                @endif
            </div>

          </div>


          <h2 class="is-medium">串流平台</h2>
          @foreach ($video->platforms as $platform)
            <a class="button" target="_blank" title="{{ $platform->title }}" href="{{ $platform->page_url }}">{{ $platform->platform_name }}</a>
          @endforeach

        </div>
      </section>
    </section>
@stop
