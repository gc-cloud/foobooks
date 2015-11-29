<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Respond from requests to GET books
    */
    public function getIndex(Request $request)
    {
      // USE our ORM book model to retrieve all the books, pass to view
      $books = \App\Book::orderBy('id','DESC')->get();
      return view("books.index", compact('books'));
    }

    /**
    * Responds to requests to GET /books/edit/{$id}
    */
    public function getEdit($id = null) {
        $book = \App\Book::find($id);
        if(is_null($book)) {
            \Session::flash('flash_message','Book not found.');
            return redirect('\books');
        }

        $authors = \App\Author::orderby('last_name','ASC')->get();
        $authors_for_dropdown = [];
        foreach($authors as $author) {
            $authors_for_dropdown[$author->id] = $author->last_name.', '.$author->first_name;
        }
        return view('books.edit')->with(['book'=>$book, 'authors_for_dropdown' => $authors_for_dropdown]);
    }


    /**
        * Responds to requests to POST /books/edit
        */
        public function postEdit(Request $request) {
            // Validation
            $book = \App\Book::find($request->id);
            $book->title = $request->title;
            $book->author_id = $request->author;
            $book->cover = $request->cover;
            $book->published = $request->published;
            $book->purchase_link = $request->purchase_link;
            $book->save();
            \Session::flash('flash_message','Your book was updated.');
            return redirect('/books/edit/'.$request->id);
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
