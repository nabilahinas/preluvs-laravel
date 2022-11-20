<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$user = User::where('id', auth()->user()->id)->get();
        //$books = Book::where('book_id', $wishlist->book_id)->get();

        //ddd($user->wishlist);

        // $books = Book::where('book_id', $wishlist[1]->book_id)->get();

        // for ($i=0; $i <= $wishlist->count(); $i++) { 
        //     $books[$i] = Book::where('book_id', $wishlist[$i]->book_id)->get();
        // }

        // $books = $wishlist->book()->get();

        // dd($books);

        // $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();

        // dd($wishlist->wishlist_id);
        // $books = Book::where('book_id', $wishlist->book_id->get())->get();

        // return view('list-wishlist',[
        //     "title" => "Wishlist",
        //     "active" => 'books',
        //     "css" => 'css/list-books.css',
        //     "js" => '',
        //     "user" => $user,
        // ]);

        $itemuser = $request->user();
        $itemwishlist = Wishlist::where('user_id', $itemuser->id)->get();

        //ddd($itemwishlist);
                            
        $data = array(
            'title' => 'Wishlist',
            "active" => 'wishlist',
            "css" => 'css/list-books.css',
            "js" => '',
            'itemwishlist' => $itemwishlist);

        return view('list-wishlist', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request, Book $book)
    {

        $wldata = [
            "user_id" => auth()->user()->id, 
            "book_id" => $book->id
        ];

        $validasiwishlist = Wishlist::where('book_id', $book->id)
                                    ->where('user_id', auth()->user()->id)
                                    ->first();
        if ($validasiwishlist) {
            $validasiwishlist->delete();//kalo udah ada, berarti wishlist dihapus
            return redirect('/profile')->with('success', 'Wishlist berhasil dihapus');
        } 
        else {
            
            Wishlist::create($wldata);

            return redirect('/profile')->with('success', 'Produk berhasil ditambahkan ke wishlist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $itemwishlist = Wishlist::findOrFail($wishlist);
        if ($itemwishlist->delete()) {
            return redirect('/profile')->with('success', 'Wishlist berhasil dihapus');
        } else {
            return redirect('/profile')->with('error', 'Wishlist gagal dihapus');
        }
    }
}
