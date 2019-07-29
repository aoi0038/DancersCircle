<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dancers;


class DancersController extends Controller
{
    //
    public function add()
    {
        return view('admin.dancers.create');
    }
    
    public function create(Request $request)
    {
        // 以下を追記
      // Varidationを行う
      $this->validate($request, Dancers::$rules);

      $dancers = new Dancers;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$dancers->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $dancers->image_path = basename($path);
      } else {
          $dancers->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $dancers->fill($form);
      $dancers->save();
      
      return redirect('admin/dancers/create');
    }
    
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Dancers::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Dancers::all();
      }
      return view('admin.dancers.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
    
    
    
    
    
    
    
    
    
    
    public function edit()
    {
        return view('admin.dancers.edit');
    }
    
    public function update()
    {
        return redirect('admin/dancers/edit');
    }
}
