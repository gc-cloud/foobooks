<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PracticeController extends Controller
{
  /*----------------------------------------------------
 Lecture 12
 -----------------------------------------------------*/
 /**
* Demonstrating working with users
*/
 function getExample12() {
     # Get the current logged in user
 $user = \Auth::user();
     if($user) {
         echo 'Hi logged in user '.$user->name.'<br>';
     }
     # Get a user from the database
     $user = \App\User::where('name','like','Jamal')->first();
     echo 'Hi '.$user->name.'<br>';
}
 /**
* Get all the books, eagerly loading the tags
*/
 function getExample11() {
     $books = \App\Book::with('tags')->get();

     foreach($books as $book) {
         echo '<br>'.$book->title.' is tagged with: ';
         foreach($book->tags as $tag) {
             echo $tag->name.' ';
         }
     }
     dump($books->toArray());
}
 /**
* Get a single book with its tag(s)
*/
 function getExample10() {
     $book = \App\Book::where('title','=','The Great Gatsby')->first();
     echo $book->title.' is tagged with: ';
     foreach($book->tags as $tag) {
         echo $tag->name.' ';
     }
     return '<br> Example 10: Retrieved all tags for The Great Gasby';
}
 /*----------------------------------------------------
 Examples 6-9 were from Lecture 11
 -----------------------------------------------------*/
 /**
* Get all the books with their authors
*/
 function getExample9() {
    # Eager load the authors with the books
    $books = \App\Book::with('author')->get();
    foreach($books as $book) {
        echo $book->author->first_name.' '.$book->author->last_name.' wrote '.$book->title.'<br>';
    }
    dump($books->toArray());
    return 'Example 9: Retrieved all DB books and related authors.';
}
 /**
* Get a single book with its author
*/
 function getExample8() {
     $book = \App\Book::first();
     # Get the author from this book using the "author" dynamic property
     # "author" corresponds to the the relationship method defined in the Book model
     $author = $book->author;

     # Output
     echo $book->title.' was written by '.$author->first_name.' '.$author->last_name;
     dump($book->toArray());
     dump($author->toArray());
     return 'Example 8: Retrieved first DB record of single book with author.';

}
 /**
* Associate a new author with a new book
*/
 function getExample7() {
     $author = new \App\Author;
     $author->first_name = 'J.K';
     $author->last_name = 'Rowling';
     $author->bio_url = 'https://en.wikipedia.org/wiki/J._K._Rowling';
     $author->birth_year = '1965';
     $author->save();
     dump($author->toArray());

     $book = new \App\Book;
     $book->title = "Harry Potter and the Philosopher's Stone";
     $book->published = 1997;
     $book->cover = 'http://prodimage.images-bn.com/pimages/9781582348254_p0_v1_s118x184.jpg';
     $book->purchase_link = 'http://www.barnesandnoble.com/w/harrius-potter-et-philosophi-lapis-j-k-rowling/1102662272?ean=9781582348254';
     $book->author()->associate($author); # <--- Associate the author with this book
     $book->save();
     dump($book->toArray());
     return 'Example 7: Added new book.';
}
 /**
* Querying on the Model vs. the Collection
*/
 function getExample6() {
     // Query Responsibility
     $books = \App\Book::orderBy('id','DESC')->get();
     $first = $books->first();
     $last  = $books->last();
     dump($books);
     dump($first);
     dump($last);
     return 'Example 6:dump and query responsibility';
}
 /*----------------------------------------------------
 Examples 1-5 were from Lecture 10
 -----------------------------------------------------*/
 /**
* Delete example
*/
 function getExample5() {
     $book = new \App\Book();
     $harry_potter = $book->find(8);
     $harry_potter->delete();
     return 'Example 5:delete book';
 }
 /**
* Update example
*/
 function getExample4() {
     $book = new \App\Book();
     $book->title = 'Harry Potter';
     $book->author = 'J.k Rowling';
     $book->save();
     return 'Example 4: save book';
 }
 /**
* Query for all books using the Book model
*/
 function getExample3() {
     $books = new \App\Book();
     $all_books = $books->all();
     foreach($all_books as $book) {
         echo $book->title.'<br>';
     }
     return 'Example 3: show books';
 }
 /**
* Query for all books using the Query Builder
*/
 function getExample2() {
     // Equivalent to: SELECT * FROM books
     $books = \DB::table('books')->get();
     foreach($books as $book) {
         echo $book->title.'<br>';
     }
     return 'Example 2: show books';
 }
 /**
* Insert using the Query Builder
*/
 function getExample1() {
     \DB::table('books')->insert([
         'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
         'title' => 'The Great Gatsby',
         'author' => 'F. Scott Fitzgerald',
         'published' => 1925,
         'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
         'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
     ]);
     return 'Example 1';
 }
}
