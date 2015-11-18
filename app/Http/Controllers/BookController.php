<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{

    /**
    * Respond from requests to get books
    */
    public function getIndex()
    {
      // USE our ORM book model to retrieve all the books, pass to view
      $books = \App\Book::all();
      return view("books.index", compact('books'));
    }



    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title= null) {
        $books = \App\Book::all();
//        return view('books.show')->with('title', $title);
        return view('books.show', compact('books','title'));

    }

    /**
    * Responde to requests to create books
    */
    public function getCreate()
    {
        return view('books.create');
    }


    /**
     * Show the form for creating a new Book.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
      // Validate the request data
      $this->validate($request, [
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'cover' => 'required|url',
          'purchase_link' => 'required|min:5',
      ]);

      # Instantiate a new Book Model object
      $book = new \App\Book();

      # Set the parameters
      # Note how each parameter corresponds to a field in the table
      # TO-do explore masa assignments to avoid verbose code
      $book->title = $request->title;
      $book->author = $request->author;
      $book->published = $request->published;
      $book->cover = $request->cover;
      $book->purchase_link = $request->purchase_link;

      # Invoke the Eloquent save() method
      # This will generate a new row in the `books` table, with the above data
      $book->save();


      /* Search database to get ID of new title  */

      $newBook = \App\Book::where('Title',$book->title)->get()->sortBy('id')->last();
      if ($newBook){
        echo "New book saved with title: ".$newBook->title." and ID: ".$newBook->id;
      } else {
        echo "No book found!!!";
      }

      // fetch all books
      $books = \App\Book::all();
      dump($books);
      //return redirect('\books');
      return view("books.index", compact('books'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
