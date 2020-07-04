@extends('layouts.master')

@section('pageTitle', "搜尋結果")

@section('content')
    <h1 class='title'>搜尋"{{ $keyword }}"找到以下結果</h1>

    <section class="video_search section">
      @include('videos._search_form')
    </section>

    <section class="video_list section">
      @include('videos._video_list', ['videos'=>$results])
    </section>
    
    {{ $results->links() }}
@stop
