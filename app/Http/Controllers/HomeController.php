<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\ExitOrder;
use App\Models\Tank;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($pass_number)
    {
		$docs = DB::table('documents')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

        $docs = DB::table('exit_orders')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

        $docs = DB::table('tanks')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		return view('/home')->with('docs', $docs);
	}

    public function welcome()
    {
        $p_num = 
		$docs = DB::table('documents')
		->where('pass_number', {{ Auth::user()-> pass_number }} )
		->orderBy('end_date', 'desc')
		->get();

        $e_orders = DB::table('exit_orders')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

        $tanks = DB::table('tanks')
		->where('pass_number', $pass_number)
		->orderBy('end_date', 'desc')
		->get();

		return view('/welcome/{pass_number}')
        ->with('docs', $docs)
        ->with('e_orders', $e_orders)
        ->with('tanks', $tanks);

	}
}
