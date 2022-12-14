<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        //ログインユーザーの情報を取得
        $tasks = Task::where('user_id', \Auth::user()->id)->get();
        
        // メッセージ一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required',
            'status' => 'required|max:10',   
        ],
        [
             'content.required' => 'タスクは必須です。',
      ]);
        
        $task = new Task;
        //送られてきたフォームの内容は $request に入っている。
        $task->content = $request->content;
        $task->status = $request->status;
        //auth()->id();と書く事で、自動的に現在ログインしているユーザーのid番号を取得できます。
        $task->user_id = auth()->id();
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // getでtasks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::find($id);
        
        $user_id = \Auth::user()->id;
        
        //ログインユーザーの場合
        if ($user_id === $task->user_id) {
            // メッセージ詳細ビューでそれを表示
            return view('tasks.show', [
                'task' => $task,
                'user_id' => $user_id,
            ]);
        }
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // getでtasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::find($id);
        
        $user_id = \Auth::user()->id;
        
        //ログインユーザーの場合
        if ($user_id === $task->user_id) {
            // メッセージ編集ビューでそれを表示
            return view('tasks.edit', [
                'task' => $task,
                'user_id' => $user_id,
            ]);
        }
        
        // トップページへリダイレクトさせる
        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // putまたはpatchでtasks/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'content' => 'required',
            'status' => 'required|max:10',   
          ],
        [
             'content.required' => 'タスクは必須です。',
        ]);
        
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // deleteでtasks/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::find($id);
        
        // メッセージを削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
