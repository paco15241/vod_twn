{{ Form::open(['route'=> ['search'],  'method' => 'get' ]) }}
  <div class="field has-addons">
    <div class="control">
      {{ Form::text('keyword', null, ['class' => 'input', 'placeholder' => "輸入關鍵字"]) }}
    </div>

    <div class="control">
      {!! Form::submit('搜尋', ['class' => 'button is-info']) !!}
    </div>
  </div>
{{ Form::close() }}
