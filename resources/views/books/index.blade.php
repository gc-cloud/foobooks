@extends('layouts.master')


@section('title')
    Show book
@stop

@section('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

        <h1>  Index: Here are all the books</h1>
        <?php
        if(!$books->isEmpty()) {

          // Output the books
          foreach($books as $book) {
              echo $book->title.'<br>';
          }
        }
        else {
          echo 'No books found';
        }
        ?>
@stop

@section('body')
    <script src="/js/books/show.js"></script>
@stop
