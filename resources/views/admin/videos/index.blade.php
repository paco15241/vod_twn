@extends('layouts.master')

@section('pageTitle', '管理列表')

@section('content')
    <h1 class="d-inline">管理列表</h1>
    <a class="btn btn-outline-dark btn-lg float-right" href="{{ route('admin.videos.create') }}">新增影片</a>
    {{-- Search --}}
    {{ Form::open(['route'=> ['admin.videos.index'],  'method' => 'get' ]) }}
      <div class="input-group my-3 col-md-12">
        {{ Form::select('type', ['all' => '全部', 'unpublished' => '未上架', 'published' => '已上架'], $type) }}

        {{ Form::text('keyword', is_null($keyword)  ? null : $keyword , ['class' => 'form-control', 'placeholder' => "輸入關鍵字"]) }}

        <div class="input-group-append">
          {!! Form::submit('搜尋', ['class' => 'btn btn-outline-secondary']) !!}
        </div>
      </div>
    {{ Form::close() }}

    {{-- List --}}
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">狀態</th>
          <th scope="col">名稱</th>
          <th scope="col">外連資料庫</th>
          <th scope="col">編輯</th>
          <th scope="col">刪除</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($videos as $key => $video)
        <tr>
          <th scope="row">{{ $video->id }}</th>
          <td>
            @if($video->status == 1)
              已上架
            @else
              未上架
            @endif
          </td>
          <td>
            @if(is_null($video->poster_url))
            <i class="fas fa-image text-muted"></i>
            @else
            <a class="thumbnail" href="{{ $video->poster_url }}" target="_blank"><i class="fas fa-image"></i><span><img src="{{ $video->poster_url }}" /><br /></span></a>
            @endif

            <a class="text-dark" target="_blank" href="{{ route('videos.show', ['id' => $video->id]) }}">{{ $video->title }}</a>
          </td>

          <td>
            @if($video->imdb_id)
              <a class="btn btn-secondary btn-sm"  target="_blank" title="IMDb" href="https://www.imdb.com/title/{{ $video->imdb_id }}">IMDb</a>
            @else
              <a href="#" class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true">IMDb</a>
            @endif

            @if($video->atmovies_id)
              <a class="btn btn-secondary btn-sm"  target="_blank" title="開眼" href="http://www.atmovies.com.tw/movie/{{ $video->atmovies_id }}">開眼</a>
            @else
              <a href="#" class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true">開眼</a>
            @endif

            @if($video->douban_id)
              <a class="btn btn-secondary btn-sm"  target="_blank" title="豆瓣" href="https://movie.douban.com/subject/{{ $video->douban_id }}">豆瓣</a>
            @else
              <a href="#" class="btn btn-secondary btn-sm disabled" role="button" aria-disabled="true">豆瓣</a>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.videos.edit', ['id' => $video->id]) }}" class="btn btn-primary btn-sm">編輯</a>
          </td>
          <td>
            <a href="{{ route('admin.videos.destroy', ['id' => $video->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-danger btn-sm">刪除</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $videos->appends(request()->except('page'))->links() }}

@stop
