@extends('layouts.master')


@section('title')
    Show book
@stop

@section('head')
    {{-- <link href="/css/books/show.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('content')

  <h1> Add a new book </h1>
    {{-- Display validations errors  --}}
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

  {!! Form::open(array('url' => 'books/create')) !!}
      {{-- {!! method_field('PUT') !!} --}}
      <fieldset>
        {!!Form::label('Title:')!!}<br>
        {!!Form::text('title')!!}<br>
        {!!Form::label('Author:')!!}<br>
        {!!Form::text('author')!!}<br>
        {!!Form::label('Published:')!!}<br>
        {!!Form::text('published')!!}<br>
        {!!Form::label('Cover:')!!}<br>
        {!!Form::text('cover')!!}<br>
        {!!Form::label('Purchase Link:')!!}<br>
        {!!Form::text('purchase_link')!!}<br>
        {!! Form::submit('Add Book', array('class' => 'btn btn-primary')) !!}
      </fieldset>
  {!! Form::close() !!}

@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
