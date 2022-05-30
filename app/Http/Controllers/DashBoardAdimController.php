<?php

namespace App\Http\Controllers;
use App\Book;
use App\Borrow;
use App\Categories;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
class DashBoardAdimController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories=Categories::get();

        $current_date = Carbon::now()->format('Y-m-d');
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year; 

        $pending_request = Borrow::where('status','0')->count();
        $borrowed_by_day = Borrow::where('status','1')->where('date_borrow',$current_date)->count();
        $borrowed_by_month = Borrow::where('status','1')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '=', $current_month)->count();
        $borrowed_by_year = Borrow::where('status','1')->whereYear('date_borrow', '=', $current_year)->count();

        return view('dashboard',[
            'borrowed_by_day'=>$borrowed_by_day,
            'borrowed_by_month'=>$borrowed_by_month,
            'borrowed_by_year'=>$borrowed_by_year,
            'pending_request'=>$pending_request,
            'categories'=>$categories,
            'books'=>$books,
        ]);
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
