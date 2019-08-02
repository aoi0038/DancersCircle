<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dancers;
use App\History;
use Carbon\Carbon;


class DancersController extends Controller
{
    
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
      
      return redirect('admin/dancers/');
    }
    
    public function index(Request $request)
    {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Dancers::where('name', 'LIKE',"%$cond_name%")->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Dancers::all();
      }
      return view('admin.dancers.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    
    
    public function edit(Request $request)
    {
      // Dancers Modelからデータを取得する
      $dancers = Dancers::find($request->id);
      if (empty($dancers)) {
        abort(404);    
      }
      return view('admin.dancers.edit', ['dancers_form' => $dancers]);
    }

    
    public function update(Request $request)
    {
        // Validationをかける
      $this->validate($request, Dancers::$rules);
      // Dancers Modelからデータを取得する
      $dancers = Dancers::find($request->id);
      // 送信されてきたフォームデータを格納する
      $dancers_form = $request->all();
      if ($request->remove == 'true') {
            $dancers_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $dancers_form['image_path'] = basename($path);
        } else {
            $dancers_form['image_path'] = $dancers->image_path;
        }
      unset($dancers_form['_token']);
      unset($dancers_form['image']);
      unset($dancers_form['remove']);
      
      $dancers->fill($dancers_form)->save();
      
      $history = new History;
      $history->dancers_id = $dancers->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/dancers/');
    }
    
    public function delete(Request $request)
    {
      // 該当するNews Modelを取得
      $dancers = Dancers::find($request->id);
      // 削除する
      $dancers->delete();
      return redirect('admin/dancers/');
    }
   
    public function category()
    {
        return view('admin.dancers.category');
    }
    
}
