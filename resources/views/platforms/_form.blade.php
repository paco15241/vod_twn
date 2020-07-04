{{ Form::model($platform, [
    'route'  => $platform->exists ? [ 'platforms.update', $platform->id] : ['platforms.store'], 
    'method' => $platform->exists ? 'put' : 'post', 
    'files'  =>true,
    'class'  => 'my-md-5'
]) }}

  {{ Form::hidden ('video_id', $video_id) }}

  <div class="form-group row">
    {{ Form::label('video_id', '影片 ID', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      <input class="form-control" id="video_id" type="text" placeholder="{{ $video_id }}" disabled>
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('platform_name', '平台', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('platform_name', null, ['class' => 'form-control']) }}
    </div>
  </div>
  
  <div class="form-group row">
    {{ Form::label('vod_id', '序號', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('vod_id', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('vod_title', '標題', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('vod_title', null, ['class' => 'form-control']) }}
    </div>
  </div>
  
  <div class="form-group row">
    {{ Form::label('vod_description', '描述', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::textarea('vod_description', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('vod_url', '網址', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('vod_url', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('vod_provider', '供應商', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('vod_provider', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('on_at', '上架時間', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('on_at', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    {{ Form::label('off_at', '下架時間', ['class' => 'col-md-2 col-form-label']) }}
    <div class="col-md-10">
      {{ Form::text('off_at', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <div class="form-group row">
    <div class="col-md-2">選項</div>
    <div class="col-md-10">
      <div class="form-check">
        {{ Form::checkbox('status', '1', $platform->status ? true : false, $attributes=['class' => 'checkbox']) }}
        {{ Form::label('status', '是否上線', ['class' => 'col-md-2 form-check-label']) }}
    </div>
    </div>
  </div>

  @if($platform->exists)
  {!! Form::submit('更新', ['class' => 'btn btn-primary btn-lg']) !!}
  <a href="{{ route('platforms.destroy', ['id' => $platform->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="btn btn-danger btn-lg">刪除</a>
  @else
  {!! Form::submit('送出', ['class' => 'btn btn-primary btn-lg']) !!}
  {!! Form::reset('重置', ['class' => 'btn btn-primary btn-lg']) !!}
  @endunless

{{ Form::close() }}
