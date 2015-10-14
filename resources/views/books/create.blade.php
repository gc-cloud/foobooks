@extends('layouts.master')


@section('title')
    Show book
@stop

@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

  <p> Start  the creation of  a new book</p>
  {!! Form::open(array('url' => 'books/create')) !!}
      {!!Form::text('title')!!}
      {!!Form::submit('Submit!')!!}
  {!! Form::close() !!}

@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
