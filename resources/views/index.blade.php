@extends('layouts.master')

@section('pageTitle', '影片列表')

@section('content')
    <h1 class='title'>影片列表</h1>
    <section class="video_list section">
      <section class="container">
        <div class="columns is-multiline">
          
          @foreach ($videos as $key => $video)
          <div class="column is-2">
            <div class="card video-item is-shadowless">
              <div class="card-image">
                <figure class="image">
                  <a href="{{ route('videos.show', $video->id) }}">
                    <img src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px;">
                  </a>
                </figure>
              </div>
              <div class="card-content">
                <div class="content">
                  <a href="{{ route('videos.show', $video->id) }}">
                    <h4 class="is-size-6">{{ $video->title }}</h4>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </section>
    </section>
@stop
