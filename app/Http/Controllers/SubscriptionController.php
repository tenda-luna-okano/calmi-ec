<?php

namespace App\Http\Controllers;

use App\Models\SubscribeDetailMaster;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = SubscribeDetailMaster::all();
        return view ('subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //customer_idをAuthに
        $subscriptionNow = Subscription::where('customer_id',1)->with('subscribeDetailMaster')->first();
        $subscriptionData = SubscribeDetailMaster::all();

        //dd($subscriptionNow);

        $subscription_img=[];
        for($cnt=1;$cnt<=3;$cnt++)
        {
            if($cnt!=$subscriptionNow->subscribe_detail_id)
            {
                $subscription_img[]=['img'=>SubscribeDetailMaster::where('subscribe_detail_id',$cnt)->first()->subscribe_img,'id'=>$cnt];
            }
        }
        //dd($subscription_img);

        return view('subscription/edit',['subscription'=>$subscriptionNow,'subscriptionData'=>$subscriptionData,'subscriptionImg'=>$subscription_img]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, /*Subscription $subscription*/)
    {
        //dd($request);
        $ID=$request->input('subscriptionID');

        Subscription::where('customer_id',1)
        ->update([
            'subscribe_detail_id'=>$ID
        ]);
        return view('top');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        Subscription::where('customer_id',1)->delete();
    }
}
