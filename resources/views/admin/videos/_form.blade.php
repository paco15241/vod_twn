{{ Form::model($video, [
    'route'  => $video->exists ? [ 'admin.videos.update', $video->id] : ['admin.videos.store'], 
    'method' => $video->exists ? 'put' : 'post', 
    'files'  => true,
    'class'  => 'my-md-5'
  ]) }}

  <div class="form-group row">
    {{ Form::label('title', '標題', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('title_en', '標題（英文）', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('title_en', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('description', '描述', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('description_en', '描述（英文）', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::textarea('description_en', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('year', '年份', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('year', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('poster_url', '海報網址', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('poster_url', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('imdb_id', 'IMDb ID', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('imdb_id', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('atmovies_id', '開眼 ID', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('atmovies_id', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('douban_id', '豆瓣 ID', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('douban_id', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    <div class="col-md-2">選項</div>
    <div class="col-md-10">
      <div class="form-check">
        {{ Form::checkbox('status', '1', $video->status ? true : false, $attributes=['class' => 'form-check-input']) }}
        {{ Form::label('status', '是否上線', ['class' => 'col-md-2 form-check-label']) }}
    </div>
    </div>
  </div>
  
  @if($video->exists)
  <hr />
  <a href="{{ route('admin.platforms.create', ['video_id'=>$video->id]) }}" class="btn btn-primary btn-lg">新增平台</a>

  @unless($video->platforms->isEmpty())
  <div class="table-container">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>平台</th>
          <th>標題</th>
          <th>編輯</th>
          <th>刪除</th>
        </tr>
      </thead>
      <tbody>
        @foreach($video->platforms as $platform)
        <tr>
          <td>{{ $platform->platform_name }}</td>
          <td><a href="{{ $platform->vod_url }}" target="_blank">{{$platform->vod_title}}</a></td>
          <td><a href="{{ route('admin.platforms.edit', ['id' => $platform->id]) }}" class="btn btn-primary btn-sm">編輯</a></td>
          <td><a href="{{ route('admin.platforms.destroy', ['id' => $platform->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-danger btn-sm">刪除</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @else
    <p>尚未有平台資料</p>
  @endif

  @endif

  {{--  @include('_platforms_form')  --}}
  <hr />

  @if($video->exists)
  {!! Form::submit('更新', ['class' => 'btn btn-primary btn-lg']) !!}
  <a href="{{ route('admin.videos.destroy', ['id' => $video->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-danger btn-lg">刪除</a>
  @else
  {!! Form::submit('送出', ['class' => 'btn btn-primary btn-lg']) !!}
  {!! Form::reset('重置', ['class' => 'btn btn-primary btn-lg']) !!}
  @endunless

{{ Form::close() }}
