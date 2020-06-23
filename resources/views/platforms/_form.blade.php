{{ Form::model($platform, [
  'route'=> $platform->exists ? [ 'platforms.update', $platform->id] : ['platforms.store'], 
  'method' => $platform->exists ? 'put' : 'post', 
  'files'=>true]) }}

  {{ Form::hidden ('video_id', $video_id) }}

  <div class="field">
    {{ Form::label('platform_name', '平台', ['class' => 'label']) }}
    {{ Form::text('platform_name', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('title', '標題', ['class' => 'label']) }}
    {{ Form::text('title', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('description', '描述', ['class' => 'label']) }}
    {{ Form::textarea('description', null, ['class' => 'textarea']) }}
  </div>

  <div class="field">
    {{ Form::label('page_url', '網址', ['class' => 'label']) }}
    {{ Form::text('page_url', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('provider', '供應商', ['class' => 'label']) }}
    {{ Form::text('provider', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('on_at', '上架時間', ['class' => 'label']) }}
    {{ Form::text('on_at', null, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('off_at', '下架時間', ['class' => 'label']) }}
    {{ Form::text('off_at', null, ['class' => 'input']) }}
  </div>

  @if($platform->exists)
  {!! Form::submit('更新', ['class' => 'button is-primary is-medium']) !!}
  <a href="{{ route('platforms.destroy', ['id' => $platform->id]) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure?" class="button is-danger is-medium">刪除</a>
  @else
  {!! Form::submit('送出', ['class' => 'button is-primary is-medium']) !!}
  {!! Form::reset('重置', ['class' => 'button is-primary is-medium']) !!}
  @endunless

{{ Form::close() }}
