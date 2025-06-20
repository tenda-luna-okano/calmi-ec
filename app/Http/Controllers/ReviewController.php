<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ItemMaster;
use App\Models\Review;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    //
    public function index($item_id){
        
        $item=ItemMaster::where('item_id',$item_id)->first();

        // レビュー投稿のビューを返す
        return view('reviews.index',compact('item_id','item'));
    }

      public function store(Request $request,$item_id)
    {
       $validated = $request->validate([
        'review_name' => 'required|string|max:100',
        'customer_nickname' => 'required|string|max:50',
        'customer_mail' => ['required', 'string', 'email:strict,dns','max:255'],
        'review_star' => 'required|integer|min:1|max:5',
        'review_content' => 'required|string|max:1000',
        'reviewer_age' => 'required|in:10,20,30,40,50,60',
    ]);
    $validated['review_item_id'] = $item_id;

    Review::create($validated);

     
    return redirect()->route('products.show', $item_id)->with('message', 'レビューを投稿しました！');  
   }
}

