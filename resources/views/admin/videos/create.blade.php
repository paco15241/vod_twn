@extends('layouts.master')

@section('pageTitle', '新增影片')

@section('content')
  <h1 class="title">新增影片</h1>
  @include('admin.videos._form')
@endsection
