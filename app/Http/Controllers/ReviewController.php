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
        


        // レビュー投稿のビューを返す
        return view('reviews.index');
    }
      public function store(Request $request)
    {
       $validated = $request->validate([
        'review_name' => 'required|string|max:100',
        'review_item_id' => 'required|int',
        'customer_nickname' => 'required|string|max:50',
        'customer_mail' => ['required', 'string', 'email:strict,dns','max:255'],
        'review_star' => 'required|integer|min:1|max:5',
        'review_content' => 'required|string|max:1000',
        'reviewer_age' => 'required|in:10,20,30,40,50,60',
    ]);
    Review::create($validated);

    return redirect()->back()->with('message', 'レビューを投稿しました！');  
   }
}