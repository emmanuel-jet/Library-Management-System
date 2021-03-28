<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Book;

class BookController extends Controller
{
	public function index()
    {
        //
        $books = Book::orderBy('created_at', 'desc')->paginate();

        return response()->json($books, 200);
    }

    public function show($id){

    	$book = Book::findorFail($id);

        return response()->json($book, 200);
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'book_name' => 'required',
            'book_author' => 'required',
            'book_category' => 'required',
            'book_category' => 'required',
            'call_mark' => 'required',
            'yop' => 'required',
            'pop' => 'required',
            'bar_num' => 'required',
            'collation' => 'required',
            'borrow_qty' => 'required',
            'stock_qty' => 'required'
        ]);

        $book = $request->isMethod('put') ? Book::findorFail($request->book_id) : new Book;
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        $book->book_category = $request->category;
        $book->stock_qty = $request->stock_qty;
        $book->borrow_qty = $request->borrow_qty;
        $book->isbn = $request->isbn;
        $book->book_location = $request->book_location;
        $book->collation = $request->collation;
        $book->call_mark = $request->call_mark;
        $book->bar_num = $request->bar_num;
        $book->yop = $request->yop;
        $book->pop = $request->pop;

        if ($book->save()) {
            return response()->json( $book, 200);
        } else {
            return response()->json( $book, 500);
        }
    }

    
    public function destroy(Book $book)
    {
        //
        if($book->delete()){
            return response()->json([
                'message' => 'Book deleted successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occured, try again later',
                'status_code' => 500
            ], 500);
        }
    }
}  