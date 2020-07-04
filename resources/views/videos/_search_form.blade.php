{{ Form::open(['route'=> ['search'],  'method' => 'get' ]) }}
  <div class="input-group my-3 col-md-12">
    {{ Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => "輸入關鍵字"]) }}

    <div class="input-group-append">
      {!! Form::submit('搜尋', ['class' => 'btn btn-outline-secondary']) !!}
    </div>
  </div>
{{ Form::close() }}
