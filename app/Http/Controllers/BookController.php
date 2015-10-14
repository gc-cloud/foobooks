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
        return ' Here are all the books';
    }

    /**
    * Respond to foobooks getShow
    */
    public function getShow($title)
    {
        return 'Show book: ' . $title;
    }


    /**
    * Responde to requests to create books
    */
    public function getCreate()
    {
        echo 'Start  the creation of  a new book';
        $pageHtml = '<form method="POST" action="/books/create">';
        $pageHtml.= csrf_field(); // provide token
        $pageHtml .= '<input type ="text" name = "title">';
        $pageHtml .='<input type="submit">';
        $pageHtml .='</form>';
        return $pageHtml;
    }


        /**
         * Show the form for creating a new Book.
         *
         * @return \Illuminate\Http\Response
         */
        public function postCreate()
        {
              return 'Process the creation of  a new book: '.$_POST["title"];
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
