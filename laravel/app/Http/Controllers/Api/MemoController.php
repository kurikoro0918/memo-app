<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;
use App\Http\Resources\MemoResource;
class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ★ 1. Memoモデルを使って、作成日時が新しい順にすべてのメモを取得
        $memos = Memo::latest()->get();

        // ★ 2. 取得したデータをJSON形式で返す
        return MemoResource::collection($memos);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 2. データベースに保存
        $memo = Memo::create($validatedData);

        return new MemoResource($memo);


    // ... 他のメソッド (update, destroyなど) ...
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
