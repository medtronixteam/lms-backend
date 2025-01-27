<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateSheetController extends Controller
{
    function salarPrint($sheetId){
        return view('admin.print_datesheet');
    }
    function resultPrint($resultId){
        return view('admin.print_resultCard');
    }


}
