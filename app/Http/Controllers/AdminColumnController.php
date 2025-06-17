<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;

class AdminColumnController extends Controller
{
    public function store(Request $request){
        //バリデーション
        $validated = $request->validate([
            'column_name' => ['required', 'string', 'max:30'],
            'column_img' => 'required|image',
            'column_content' =>['required', 'string', 'min:30', 'max:400'],
        ]);

        $imagePath = null;

        if ($request->hasFile('column_img')) {
            $image = $request->file('column_img');

            // imgnameを定義
            $imageName = time() . '_' . $image->getClientOriginalName();

            // 正しく保存する
            $image->move(public_path('img/columns'), $imageName);

            // 保存用パス
            $imagePath = 'img/columns/' . $imageName;
        }

        Column::create([
            'column_name' => $validated['column_name'],
            'column_img' => $imagePath,
            'column_content' => $validated['column_content'],
            'admin_user_id' => 1,
        ]);

        return redirect()->route('admin.dashboard')->with('message','コラムを投稿しました');
    }
}
