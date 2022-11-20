<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemuser = auth()->user()->id;
        $itemcart = Cart::where('user_id', $itemuser)->get();

        //ddd($itemwishlist);
                            
        $data = array(
            'title' => auth()->user()->user_name.' Cart',
            "active" => 'cart',
            "css" => 'css/cart.css',
            "js" => '',
            'itemcart' => $itemcart);

        return view('cart', $data);
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
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request, Book $book)
    {

        $inputancart = [
            "book_id" => $book->id,
            "user_id" => auth()->user()->id, 
        ];
        
        $itemuser = auth()->user()->id;
        //$itemproduk = Book::findOrFail($book->book_id);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login
        $cart = Cart::where('book_id', $book->id)
                    ->where('user_id', $itemuser)
                    ->first();

        if ($cart) {
            return redirect('/profile')->with('success', 'Book is already in the cart!');
        } else {
            //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            
            $qty_book = $book->book_quantity;
            $total_price = $qty_book * $book->book_price;

            $inputancart['qty'] = $qty_book;
            $inputancart['total_price'] = $total_price;

            // dd($inputancart);
            
            Cart::create($inputancart);
            
            return redirect('/profile')->with('success', 'Product saved to cart!');
            
        }

    
        /*
        $cartdata = [
            "user_id" => auth()->user()->id,
            "book_id" => $book->book_id,
            "cart_item_quantity" => 1
        ];

        Cart::create($cartdata);

        return redirect('/profile')->with('success', 'cart saved!'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
