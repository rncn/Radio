<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Player;
class PostController extends Controller
{
    public function showCreateForm()
    {
        return view('posts/create');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'radio' => 'required',
        ]);

        // Postモデルのインスタンスを作成する
        $post = new Post();
        // タイトル
        $post->title = $request->title;
        //コンテンツ
        $post->content = $request->content;
        //音声ファイル
        $path = $request->radio->store('public');
        //パスを正しく設定
        $read_path = str_replace('public/', 'storage/', $path); 
        //$pathの値をDBに入れる
        $post->audio_path = $read_path;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $post->save();
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
        return redirect()->route('posts.detail', [
            'post' => $post->id,
        ]);
    }

    public function detail(Post $post)
    {
        //セッションに保存
        session(['playnow' => $post]);
        return view('posts/detail', [
            'title' => $post->title,
            'content' => $post->content,
            'audiofile' => $post->audio_path,
            'user_id' => $post->user_id,
        ]);
    }
}
