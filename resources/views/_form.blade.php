{{ Form::model($video, [
  'route'=> $video->exists ? [ 'videos.update', $video->id] : ['videos.store'], 
  'method' => $video->exists ? 'put' : 'post', 
  'files'=>true]) }}

  <div class="field">
    {{ Form::label('title', '標題', ['class' => 'label']) }}
    {{ Form::text('title', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('title_en', '標題（英文）', ['class' => 'label']) }}
    {{ Form::text('title_en', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('description', '描述', ['class' => 'label']) }}
    {{ Form::textarea('description', null, ['class' => 'textarea']) }}
  </div>

  <div class="field">
    {{ Form::label('description_en', '描述（英文）', ['class' => 'label']) }}
    {{ Form::textarea('description_en', null, ['class' => 'textarea']) }}
  </div>

  <div class="field">
    {{ Form::label('year', '年份', ['class' => 'label']) }}
    {{ Form::text('year', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('poster_url', '海報網址', ['class' => 'label']) }}
    {{ Form::text('poster_url', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('imdb_id', 'IMDb ID', ['class' => 'label']) }}
    {{ Form::text('imdb_id', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('atmovies_id', '開眼 ID', ['class' => 'label']) }}
    {{ Form::text('atmovies_id', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('douban_id', '豆瓣 ID', ['class' => 'label']) }}
    {{ Form::text('douban_id', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    <label class="checkbox">
      {{ Form::checkbox('status', '1', $video->status ? true : false, $attributes=['class' => 'checkbox']) }}
      是否上線
    </label>
  </div>

  
  @if($video->exists)
  <hr />
  <a href="{{ route('platforms.create', ['video_id'=>$video->id]) }}" class="button is-medium is-primary">新增平台</a>

  @unless($video->platforms->isEmpty())
  <div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable">
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
          <td><a href="{{ route('platforms.edit', ['id' => $platform->id]) }}" class="button is-small">編輯</a></td>
          <td><a href="{{ route('platforms.destroy', ['id' => $platform->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="button is-danger is-small">刪除</a></td>
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
  {!! Form::submit('更新', ['class' => 'button is-primary is-medium']) !!}
  <a href="{{ route('videos.destroy', ['id' => $video->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="button is-danger is-medium">刪除</a>
  @else
  {!! Form::submit('送出', ['class' => 'button is-primary is-medium']) !!}
  {!! Form::reset('重置', ['class' => 'button is-primary is-medium']) !!}
  @endunless

{{ Form::close() }}
