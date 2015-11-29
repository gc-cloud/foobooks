@extends('layouts.master')


@section('title')
    Create book
@stop

@section('head')
    {{-- <link href="/css/books/show.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('content')

  <h1> Add a new book </h1>

  @include('errors')

  {!! Form::open(array('url' => 'books/create')) !!}
        <div class='form-group'>
          {!!Form::label('Title:')!!}<br>
          {!!Form::text('title','Green Eggs & Ham')!!}<br>
        </div>
        <div class='form-group'>
          {!!Form::label('Author:')!!}<br>
          {!!Form::text('author', 'Dr. Seuss')!!}<br>
        </div>
        <div class='form-group'>
          {!!Form::label('Cover (URL):')!!}<br>
          {!!Form::text('cover','http://prodimage.images-bn.com/pimages/9780394800165_p0_v4_s118x184.jpg')!!}<br>
        </div>
        <div class='form-group'>
          {!!Form::label('Published (YYYY):')!!}<br>
          {!!Form::text('published','1960')!!}<br>
        </div>
        <div class='form-group'>
          {!!Form::label('Purchase Link:')!!}<br>
          {!!Form::text('purchase_link','http://www.barnesandnoble.com/w/green-eggs-and-ham-dr-seuss/1100170349?ean=9780394800165')!!}<br>
        </div>
        {!! Form::submit('Add Book', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}

@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
