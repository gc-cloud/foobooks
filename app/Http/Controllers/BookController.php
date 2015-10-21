<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    /**
    * Respond from requests to get books
    */
    public function getIndex()
    {

        return view("books.index");
        //return ' Here are all the books';
    }

    /**
    * Respond to foobooks getShow
     */
    // public function getShow($title)
    // {
    //     return 'Show book: ' . $title;
    // }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title= null) {
        return view('books.show')->with('title', $title);
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
          ]);

          $title = $request->input('title');
          return 'Process adding new book: '.$title;
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
