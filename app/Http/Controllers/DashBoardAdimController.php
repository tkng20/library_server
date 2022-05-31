<?php

namespace App\Http\Controllers;
use App\Book;
use App\Borrow;
use App\Categories;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
use DB;
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

        $monday = Carbon::now()->startOfWeek();
        $tuesday = $monday->copy()->addDay();
        $wednesday = $tuesday->copy()->addDay();
        $thursday = $wednesday->copy()->addDay();
        $friday = $thursday->copy()->addDay();
        $saturday = $friday->copy()->addDay();
        $sunday = $saturday->copy()->addDay();

        $monday = $monday->format('Y-m-d');
        $tuesday = $tuesday->format('Y-m-d');
        $wednesday = $wednesday->format('Y-m-d');
        $thursday = $thursday->format('Y-m-d');
        $friday = $friday->format('Y-m-d');
        $saturday = $saturday->format('Y-m-d');
        $sunday = $sunday->format('Y-m-d');

        $count_t2 = Borrow::where('status','1')->where('date_borrow',$current_date)->count();
        $count_t3 = Borrow::where('status','1')->where('date_borrow',$tuesday)->count();
        $count_t4 = Borrow::where('status','1')->where('date_borrow',$wednesday)->count();
        $count_t5 = Borrow::where('status','1')->where('date_borrow',$thursday)->count();
        $count_t6 = Borrow::where('status','1')->where('date_borrow',$friday)->count();
        $count_t7 = Borrow::where('status','1')->where('date_borrow',$saturday)->count();
        $count_t8 = Borrow::where('status','1')->where('date_borrow',$sunday)->count();

        $count_thang1 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '1')->count();
        $count_thang2 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '2')->count();
        $count_thang3 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '3')->count();
        $count_thang4 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '4')->count();
        $count_thang5 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '5')->count();
        $count_thang6 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '6')->count();
        $count_thang7 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '7')->count();
        $count_thang8 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '8')->count();
        $count_thang9 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '9')->count();
        $count_thang10 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '10')->count();
        $count_thang11 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '11')->count();
        $count_thang12 = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '12')->count();

        $pending_request = Borrow::where('status','0')->count();
        $borrowed_by_day = Borrow::where('status','!=' ,'0')->where('date_borrow',$current_date)->count();
        $borrowed_by_month = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)
        ->whereMonth('date_borrow', '=', $current_month)->count();
        $borrowed_by_year = Borrow::where('status','!=' ,'0')->whereYear('date_borrow', '=', $current_year)->count();


        // $topbook_temp = Book::join('borrows', 'borrows.book_id', '=', 'books.id')
        // ->groupBy('book_id')->get();

        // $topbooks = Book::join('borrows', 'borrows.book_id', '=', 'books.id')
        // ->groupBy('book_id')
        // ->orderBy(count(array($topbook_temp)))
        // ->limit(10)
        // ->get();

        $sqlQuery_topbooks = "SELECT *, count(*) as solan
        From books join borrows on books.id = borrows.book_id
        Group by book_id
        Order by count(*) DESC
        Limit 10
        ";
        $result_topBooks = DB::select(DB::raw($sqlQuery_topbooks));

        $sqlQuery_topUsers = "SELECT *, count(*) as solan
        From users join borrows on users.id = borrows.user_id
        WHERE borrows.status != 0
        Group by user_id
        Order by count(*) DESC
        Limit 10
        ";
        $result_topUsers = DB::select(DB::raw($sqlQuery_topUsers));

        return view('dashboard',[
            'borrowed_by_day'=>$borrowed_by_day,
            'borrowed_by_month'=>$borrowed_by_month,
            'borrowed_by_year'=>$borrowed_by_year,
            'pending_request'=>$pending_request,
            'categories'=>$categories,
            'books'=>$books,
            'count_t2'=>$count_t2,
            'count_t3'=>$count_t3,
            'count_t4'=>$count_t4,
            'count_t5'=>$count_t5,
            'count_t6'=>$count_t6,
            'count_t7'=>$count_t7,
            'count_t8'=>$count_t8,
            'count_thang1'=>$count_thang1,
            'count_thang2'=>$count_thang2,
            'count_thang3'=>$count_thang3,
            'count_thang4'=>$count_thang4,
            'count_thang5'=>$count_thang5,
            'count_thang6'=>$count_thang6,
            'count_thang7'=>$count_thang7,
            'count_thang8'=>$count_thang8,
            'count_thang9'=>$count_thang9,
            'count_thang10'=>$count_thang10,
            'count_thang11'=>$count_thang11,
            'count_thang12'=>$count_thang12,
            'topbooks'=>$result_topBooks,
            'topusers'=>$result_topUsers,
        ]);
    }

    public function index2()
    {
        // $borrows = Borrow::all();
        $borrows = Borrow::orderBy('date_borrow', 'desc')
        ->where('status','0')
        ->orderBy('date_return', 'asc')
        ->get();
        return view('borrow.index2')->with('borrows',$borrows);
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
