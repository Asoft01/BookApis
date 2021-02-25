<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class ApiController extends Controller
{
    //
    
    public function getAllBooks() {
        // logic to get all books goes here
        $books = book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
      }
  
      public function createBook(Request $request) {
        // logic to create a book record goes here
        $book = new Book;
        $book->name =            $request->name;
        $book->isbn =            $request->isbn;
        $book->author_id =       1;
        $book->number_of_pages = $request->number_of_pages;
        $book->publisher =       $request->publisher;
        $book->country =         $request->country;
        $book->released_date =   $request->released_date;
        $book->save();
    
            return response()->json([
                "message" => "book record created"
            ], 201);
      }
  
      public function getBook($id) {
        // logic to get a book record goes here
        if (book::where('id', $id)->exists()) {
          $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($book, 200);
        } else {
          return response()->json([
            "message" => "book not found"
          ], 404);
        }
    }
      
  
      public function updateBook(Request $request, $id) {
        // logic to update a book record goes here
        if (book::where('id', $id)->exists()) {
          $book = book::find($id);
          $book->name = is_null($request->name) ? $book->name : $request->name;
          $book->isbn = is_null($request->isbn) ? $book->isbn : $request->isbn;
          $book->author_id = is_null($request->author_id) ? $book->author_id : $request->author_id;
          $book->number_of_pages = is_null($request->number_of_pages) ? $book->number_of_pages : $request->number_of_pages;
          $book->publisher = is_null($request->publisher) ? $book->publisher : $request->publisher;
          $book->country = is_null($request->country) ? $book->country : $request->country;
          $book->released_date = is_null($request->released_date) ? $book->released_date : $request->released_date;
          
          $book->save();
  
          return response()->json([
              "message" => "records updated successfully"
          ], 200);
          } else {
          return response()->json([
              "message" => "book not found"
          ], 404);
          
        }
      }

  
      public function deletebook ($id) {
        // logic to delete a book record goes here
        if(book::where('id', $id)->exists()) {
          $book = Book::find($id);
          $book->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "book not found"
          ], 404);
        }
      }

      public function createAuthor(){
        $author = new Author;
        $author->name =            $request->name;
        $author->book_id =         $request->book_id;
        $book->save();
    
            return response()->json([
                "message" => "Author record created"
            ], 201);
      }

}
