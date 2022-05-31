<?php

namespace App\Http\Controllers;
use App\Book;
use App\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
class BookControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('book.list')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Categories::get();
        return view('book.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
        $book = new Book;
        $book->tenSach = $request->tenSach;
        $book->tacGia = $request->tacGia;
        $book->categories_id = $request->categories_id;
        $book->soLuong = $request->soLuong;
        $book->soTrang = $request->soTrang;
        $book->ngayXB = $request->ngayXB;
        $book->moTa = $request->moTa;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/storage'), $filename);
            $book['image']= $filename;
        }
        
        $book->save();

        return redirect()->route('book.index')->with('msg', 'Thêm sách thành công!');
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
        $book = Book::findOrFail($id);
        return view('book.show', compact('book','book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories=Categories::get();
        return view('book.edit', compact('book','book'))->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, $id)
    {
        //
        $book = Book::findOrFail($id);
        $input = $request->all();
        $book->fill($input)->save();       
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('book.index');
    }
}
