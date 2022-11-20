<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Wishlist;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('searchbook'));
        $books= Book::latest();

        if(request('searchbook')){
            $books->where('book_title','like', '%'. request('searchbook'). '%');
        }

        return view('list-books',[
            "title" => "Book List",
            "active" => 'books',
            "css" => 'css/list-books.css',
            "js" => '',
            "books" => $books->get(),
            "categories" => Category::all()
        ]);
    }

    public function home(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload-book',[
            'categories' => Category::all(),
            "title" => "Upload Book",
            "active" => 'upload',
            "css" => 'css/upload-book.css',
            "js" => '',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
                        'book_title' => 'required|min:3|max:255',
                        'slug' => 'min:3|max:255',
                        'book_pict' => 'image|file|max:3000',
                        'book_price' => 'required|integer',
                        'book_description' => 'max:1000',
                        'book_author' => 'required|min:3|max:255',
                        'book_quantity' => 'required|integer',
                        'book_pageNum' => 'required|integer',
                        'book_lang' => 'required|min:6|max:255',
                        'book_publisher' => 'min:3|max:100',
                        'book_publishDate' => 'date',
                        'book_isbn' => 'min:6|max:10',
                        'category_id' => 'required',
                    ]);
                    
                    
        if($request->file('book_pict')){
            $validatedData['book_pict'] = $request->file('book_pict')->store('book-pics');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Book::create($validatedData);

        return redirect('/profile')->with('success', 'Book has been uploaded!');
    }

    public function detailBook(Book $book){
        return view('book-detail',[
            "title" => "Book detail",
            "active" => 'book det',
            "css" => '/css/book-detail.css',
            "js" => '',
            "book" => $book
        ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // dd(request('search'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('edit-book',[
            'categories' => Category::all(),
            'book' => $book,
            "title" => "Edit Book",
            "active" => 'edit book',
            "css" => 'css/upload-book.css',
            "js" => '',
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validate([
                        'book_title' => 'required|min:3|max:255',
                        'slug' => 'min:3|max:255',
                        'book_pict' => 'image|file|max:3000',
                        'book_price' => 'required|integer',
                        'book_description' => 'max:1000',
                        'book_author' => 'required|min:3|max:255',
                        'book_quantity' => 'required|integer',
                        'book_pageNum' => 'required|integer',
                        'book_lang' => 'required|min:6|max:255',
                        'book_publisher' => 'min:3|max:100',
                        'book_publishDate' => 'date',
                        'book_isbn' => 'min:6|max:10',
                        'category_id' => 'required',
                    ]);

        if($request->file('book_pict')){
            $validatedData['book_pict'] = $request->file('book_pict')->store('book-pics');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Book::where('id', $book->id)
                ->update($validatedData);
        
        return redirect('/profile')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::destroy($book->id);

        return redirect('/profile')->with('success', 'Book has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // public function storeWishlist(Request $request, Book $book){

    //     //dd($book->id);

    //     $wldata = [
    //         "user_id" => auth()->user()->id, 
    //         "book_id" => $book->book_id
    //     ];

    //     Wishlist::create($wldata);

    //     return redirect('/profile')->with('success', 'wishlist saved!');
    // }
}
