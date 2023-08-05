<?php

namespace App\Http\Controllers;

use App\User;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reports = Report::all();

        return view('reports', compact('reports'));
    }

    public function search()
    {
        $inputValue = request()->searchBarReports;
        $report  = Report::where('report_type','LIKE','%'. $inputValue .'%')->orWhere('city','LIKE','%'. $inputValue .'%')->orWhere('idUsers', 'LIKE', '%'. $inputValue.'%')->get();

        if(count($report) > 0){
            return view('/searchReports')->withDetails($report)->withQuery($inputValue);
        }else{
            $collection = collect(null);
            return view ('/searchReports')->withDetails($collection);
        }
    }

}
