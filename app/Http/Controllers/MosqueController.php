<?php

namespace App\Http\Controllers;

use Auth; 
use \Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\tbl_mosque;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MosqueExport;


class MosqueController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $mosque_data = MosqueCommittee::where([['role_id', 5],['pass_test', 1]])
        //             ->orWhere([['role_id', 6],['pass_test', 1]])
        //             ->orWhere([['role_id', 7],['pass_test', 1]])
        //             ->get();
        $mosque_data = tbl_mosque::get();

		return view('report.report',compact('mosque_data'));
    }

	public function export() 
    {
        return Excel::download(new MosqueExport, 'mosque_report.xlsx');
    }

	public function getReport()
	{
		return view('report.report');
	}
}
