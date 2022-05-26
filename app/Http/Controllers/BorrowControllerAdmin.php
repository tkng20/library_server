<?php

namespace App\Http\Controllers;
use App\Borrow;
use App\Book;
use Illuminate\Http\Request;

class BorrowControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::all();
        return view('borrow.index')->with('borrows',$borrows);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $borrow = Borrow::find($id);
        
        return view('borrow.edit', compact('borrow','borrow'));
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
        $borrow = Borrow::findOrFail($id);
       
        $input =  $request->validate([
            'date_return' => '',
            'return_expect'=> 'required|date|after_or_equal:date_borrow',
            'status'=> 'required',
        ]);

        $borrow->fill($input)->save();

        if($borrow->status == "1" & $borrow->date_return == null ){

            $book = Book::findOrFail($borrow->book_id);

            $countnew = $book->soLuong - 1;
            
            $book->soLuong = $countnew;
            $book->save();
        }

        if($borrow->status == "2" & $borrow->date_return != null ){

            $book = Book::findOrFail($borrow->book_id);
            $countnew = $book->soLuong + 1;
            
            $book->soLuong = $countnew;
            $book->save();
        }

        return redirect()->route('borrow.index');
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
