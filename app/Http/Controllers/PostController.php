<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   * 新規作成フォームの表示
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('post.create');
  }

  /**
   * Store a newly created resource in storage.
   * データを保存
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //バリデーション
    $inputs = $request->validate([
      'title' => 'required|max:255',
      'body' => 'required|max:255',
      'image' => 'image|max:1024'
    ]);

    $post = new Post();

    $post->title = $request->title;
    $post->body = $request->body;
    $post->user_id = auth()->user()->id;
    //画像ファイルの保存
    if (request('image')) {
      $original = request()->file('image')->getClientOriginalName();
      //日時追加
      $name = date('Ymd_His') . '_' . $original;
      request()->file('image')->move('storage/images', $name);
      $post->image = $name;
    }

    $post->save();
    return back()->with('message', '投稿を作成しました');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
