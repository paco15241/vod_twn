@extends('layouts.master')

@section('pageTitle', '影片列表')

@section('content')
    <section class="video_search section">
      @include('videos._search_form')
    </section>

    <section class="video_list section">
      @include('videos._video_list', ['videos'=>$videos])
    </section>

    {{ $videos->links() }}
@stop
