<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminSalesController extends Controller
{
    public function index(Request $request){
        $query = DB::table('orders')
        ->selectRaw('DATE(created_at) as date, SUM(order_price_in_tax) as total_sales')
        ->groupBy('date')
        ->orderBy('date', 'desc');

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->input('start_date'));
        }
        if ($request->filled('end_date')) {
             $query->whereDate('created_at', '<=', $request->input('end_date'));
        }

        $data = $query->get();

        //総売上額を計算
        $grossSales = $data->sum('total_sales');

        return view('admin.sales.index', [
            'data' => $data,
            'grossSales' => $grossSales,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }
}
