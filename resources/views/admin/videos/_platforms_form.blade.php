@foreach ($video->platforms as $platform)
  <div class="field">
    {{ Form::label('platform[' . "$platform->id" . '][platform_name]', '平台', ['class' => 'label']) }}
    {{ Form::text('platform[' . "$platform->id" . '][platform_name]', $platform->platform_name, ['class' => 'input']) }}
  </div>

  <div class="field">
    {{ Form::label('page_url', '網址', ['class' => 'label']) }}
    {{ Form::text('page_url', $platform->vod_url, ['class' => 'input']) }}
  </div>
  
@endforeach