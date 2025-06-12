<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
       $validated = $request->validate([
        'review_name' => 'required|string|max:100',
        'customer_nickname' => 'required|string|max:50',
        'customer_mail' => ['required', 'string', 'email:strict,dns','max:255'],
        'review_star' => 'required|integer|min:1|max:5',
        'review_content' => 'required|string|max:1000',
        'reviewer_age' => 'required|in:10,20,30,40,50,60',
    ]);
     $validated['review_item_id'] = $request->item_id;

    Review::create($validated);

    return redirect()->back()->with('message', 'レビューを投稿しました！');  
    }
}
