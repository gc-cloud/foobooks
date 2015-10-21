@extends('layouts.master')


@section('title')
    Welcome
@stop

@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
        <h1>Welcome to Foobooks</h1>

        {!! HTML::link('http://foobooks.localhost/books/show/', 'Show Books')!!}
        {!! HTML::link('http://foobooks.localhost/books', 'Books Index')!!}
        {!! HTML::link('http://foobooks.localhost/books/create', 'Books Create')!!}
        {!! HTML::link('http://foobooks.localhost/logs', 'Logs')!!}
@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
