<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inscription;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        $data = Inscription::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

       return view('admin.charts.statistique', ['data'=>$data, 'months'=>$months, 'monthCount'=>$monthCount]);
    }


    public function ok()
    {
        return view('admin.tables');
    }
    
    
}
