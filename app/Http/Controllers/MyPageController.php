<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class MyPageController extends Controller
{
    //ユーザー情報変更
    public function edit_user(){
        return view('mypage.edit_user');
    }
    // 購入履歴
    public function history(Request $request){
        // ユーザーID取得
        $customer_id = $request->session()->get('customer_id',1);
        // 購入履歴一覧を取得
        $orders = Order::where('customer_id',$customer_id)->get();
        // 個別のデータを調整
        foreach($orders as $order){
            // 支払方法を数から名前へ変換
            if($order->payment_name==1){
            // $order->payment_name='クレジットカード';
                $order_method='クレジットカード';
            }else if($order->payment_name==2){
                // $order->payment_name='paypay';
                $order_method='paypay';
            }else if($order->payment_name==3){
                // $order->payment_name='銀行振り込み';
                $order_method='銀行振り込み';
            }else if($order->payment_name==4){
                // $order->payment_name='代引き';
                $order_method='代引き';
            }else if($order->payment_name==5){
                // $order->payment_name='コンビニ';
                $order_method='コンビニ';
            }else{
                $order->payment_name='error';
                // $order_method='error';
            }
            // 注文日を取得し、Y-m-dに変換
            $date = date_create($order->created_at);
            $date = date_format($date , 'Y-m-d');
            $order->created_at = $date;  //取得したtimestampのデータを、Y-m-dに変換
        }
        // ビューを返す
        return view('mypage.purchase_history',compact('orders','order_method'));
    }
    // 購入履歴詳細画面
    public function history_detail(Request $request){
        // 注文詳細のための注文ID
        $order_id = $request->order_id;
        // 注文詳細を注文IDから取得
        $order_details = OrderDetail::where('order_id',$order_id)->get();
        // 注文日などの概要取得
        $order = Order::where('order_id',$order_id)->first();
        
        // dd($order);
        // 支払方法を数から名前へ変換
        if($order->payment_name==1){
            // $order->payment_name='クレジットカード';
            $order_method='クレジットカード';
        }else if($order->payment_name==2){
            // $order->payment_name='paypay';
            $order_method='paypay';
        }else if($order->payment_name==3){
            // $order->payment_name='銀行振り込み';
            $order_method='銀行振り込み';
        }else if($order->payment_name==4){
            // $order->payment_name='代引き';
            $order_method='代引き';
        }else if($order->payment_name==5){
            // $order->payment_name='コンビニ';
            $order_method='コンビニ';
        }else{
            $order->payment_name='error';
            // $order_method='error';
        }
        // 日付データを成形
        $date = date_create($order->created_at);
        $date = date_format($date , 'Y-m-d');
        $order->created_at = $date;  //取得したtimestampのデータを、Y-m-dに変換
        // dd($order);
        // dd($order_id);
        // dd($order_details);
        // ビューを返す'
        return view('mypage.purchase_history_detail',compact('order_details','order','order_method'));
    }
}
