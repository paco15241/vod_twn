@extends('layouts.master')

@section('pageTitle', '編輯平台')

@section('content')
  <h1 class="title">編輯平台</h1>
  @include('admin.platforms._form')
@endsection
