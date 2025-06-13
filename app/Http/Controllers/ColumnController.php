<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;

class ColumnController extends Controller
{
    public function index()
    {
        $columns = Column::all();
        return view('columns.index',compact('columns'));
    }

    //コラムを詳細表示するがめん
    public function show($column_id){
        $column = Column::findOrFail($column_id);
        return view('columns.show',compact('column'));
    }
}
