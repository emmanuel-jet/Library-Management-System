<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; 

use Illuminate\Validation\Rule; 

use App\Http\Controllers\Controller;

use App\Book;

use App\Member;

use App\Category;

use App\Location;

use App\BookLocation;

use App\Issue;


class BooksController extends Controller
    {  
// Constructor
    public function __construct()
    {
        $this->middleware('auth')->except(['getIndex', 'showPage', 'ajaxsearch', 'search']);
    }
// Index
		public function getIndex()
		{
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('welcome',compact('books','categories','links'));
		}
 // View All Books
    public function index()
    {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.show',compact('books','categories','links'));
    } 
    public function showPage()
    {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    } 
    public function ajaxsearch(Request $request)
    {
    if ($request->term=='') {
       $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    }
    else {
        $links = 0;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
     ->where('books.book_name','LIKE','%'.$request->term.'%')->orWhere('books.book_author','LIKE','%'.$request->term.'%')->orWhere('categories.name','LIKE','%'.$request->term.'%')->orWhere('books.book_location','LIKE','%'.$request->term.'%')->orderBy('books.id','desc')->get();    
     
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    }
    } 

 // Book/Author/Category Search
    public function search(Request $request)
    { 
        if ($request->search_input=='') {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view(['book.show', 'welcome'],compact('books','categories','links'));
        }
        else {
        $links = 0;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('books.*','categories.name')
        ->where('books.book_name','LIKE','%'.$request->search_input.'%')->orWhere('books.book_author','LIKE','%'.$request->search_input.'%')->orWhere('categories.name','LIKE','%'.$request->search_input.'%')->orWhere('books.book_location','LIKE','%'.$request->term.'%')->orderBy('books.id','desc')->get();        
       $categories = Category::all();
        return view(['book.show', 'welcome'], compact('books','categories','links'));
        }
    }

		public function show(Request $request){
    	if($request->ajax())
          {
            $book = Book::where('id','=',$request->id)->get();       
            return response($book);
          }

    }

		public function create() 
		{
			$categories = Category::all();
			if (count($categories) == 0){
				$notification = ['message'=>'Please Add A Subject Tracing To Add New Book ','alert-type'=>'info'];
				return redirect()->back()->with($notification);
			}
			$locations = Location::all();
			if (count($locations) == 0){
				$notification = ['message'=>'Please Add A Location To Add New Book ','alert-type'=>'info'];
				return redirect()->back()->with($notification);
			}
        return view('book.create',compact('categories', $categories, 'locations', $locations));
		}
// Add Books Into the Database::Book
    public function store(Request $request)
    {  
			$this->validate($request, array(	
				'book_name' => 'required',
				'book_author' => 'required|min:4',
				'pop' => 'required',
				'yop' => 'required',
				'collation' => 'required',
				'isbn' => 'required',
				'bar_num' => 'required',
				'book_category' => 'required',
				'book_location' => 'required',
				'call_mark' => 'required|unique:books',           
				'stock_qty' => ['required',
				Rule::notIn(['0'])]
			));

        $book = new Book;
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
				$book->pop = $request->pop;
				$book->yop = $request->yop;
				$book->collation = $request->collation;
				$book->isbn = $request->isbn;
				$book->bar_num = $request->bar_num;
        $book->book_category = $request->book_category; 
				$book->book_location = $request->book_location;  
				$book->call_mark = $request->call_mark;           
        $book->stock_qty = $request->stock_qty;

        $book->save();

				//save locations
				// if (count($request->book_location) > 0) {

        //     if (count($book->locations) > 0) {
        //         foreach ($book->locations as $prev_locations) {
        //             $prev_locations->delete();
        //         }
        //     }

        //     foreach ($request->locations as $location) {
        //         $locations = new BookLocation($request->all());
        //         $locations->book_id = $book->id;
        //         $locations->location = $location;
        //         $locations->save();
        //     }
        // }

        $notification = ['message'=>'New Book Has Been Added','alert-type'=>'success'];
        return redirect()->back()->with($notification);
        
    }
//Get Book Information to set in input fields for UpdateBook.

    public function updatebook(Request $request)
    {
        if($request->ajax()){
            $book = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')            
         ->select('categories.id as category_id','books.*')
         ->where('books.id','=',$request->id)         
         ->get();
       
            return response()->json($book);
        }

    } 
//Get Member Information
    public function MemberInfo(Request $request)
    {
        if($request->ajax()){
        $member = Member::where('member_email','=',$request->member_email)
        ->orWhere('member_id','=',$request->member_email)
        ->get(['member_name','member_id']);     
        return response($member);
        }

    }

		public function edit($id)
    {
        $book = Book::findOrFail($id);
				$categories = Category::all();
				$locations = Location::all(); 

				return view('book.update',compact(['book', 'categories', 'locations']));
    }
		
// Get Information About the Book
    public function update(Request $request, $id)
    {  
			$book = Book::findOrFail($id);

			$this->validate($request, array(	
				'book_name' => 'required',
				'book_author' => 'required|min:4',
				'pop' => 'required',
				'yop' => 'required',
				'collation' => 'required',
				'isbn' => 'required',
				'bar_num' => 'required',
				'book_category' => 'required',
				'book_location' => 'required',
				'call_mark' => 'required',           
				'stock_qty' => ['required',
				Rule::notIn(['0'])]
			));

			$book->book_name = $request->book_name;
			$book->book_author = $request->book_author;
			$book->pop = $request->pop;
			$book->yop = $request->yop;
			$book->collation = $request->collation;
			$book->isbn = $request->isbn;
			$book->bar_num = $request->bar_num;
			$book->book_category = $request->book_category; 
			$book->book_location = $request->book_location;  
			$book->call_mark = $request->call_mark;           
			$book->stock_qty = $request->stock_qty;

			$book->save();

			$notification = ['message'=>'Book Updated Successfully','alert-type'=>'success'];
			return redirect()->back()->with($notification);

    }

// Delete The Book
    public function destroy(Request $request)
    {  
                       
       $hasIssue =  Issue::where('book_id','=',$request->id)->first();   
         if($hasIssue){
             return response()->json(400);
         }
         else {
            Issue::where('book_id','=',$request->id)->delete();
            Book::where('id','=',$request->id)->delete();
            return response()->json('300');
        }
               
    }


    }
