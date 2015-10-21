@extends('layouts.master')


@section('title')
    Show book
@stop

@section('head')
    {{-- <link href="/css/books/show.css" type='text/css' rel='stylesheet'> --}}
@stop

@section('content')
    {{-- Display validations errors  --}}
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



  {!! Form::open(array('url' => 'books/create')) !!}
  <p class="text-primary"> Start  the creation of  a new book</p>

      {{-- {!! method_field('PUT') !!} --}}
      {!!Form::text('title')!!}
      {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}

@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
