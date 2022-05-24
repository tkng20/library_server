<?php

namespace App\Http\Controllers;
use App\Book;
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
        $books = Book::paginate(10);
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
        return view('book.create');
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
        $book->theLoai = $request->theLoai;
        $book->soLuong = $request->soLuong;
        $book->soTrang = $request->soTrang;
        $book->ngayXB = $request->ngayXB;
        $book->moTa = $request->moTa;
        $book->save();

        return redirect()->route('book.create')->with('msg', 'Thêm sách thành công!');
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
        
        return view('book.edit', compact('book','book'));
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
