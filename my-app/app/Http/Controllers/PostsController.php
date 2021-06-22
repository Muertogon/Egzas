<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function save(Request $req){
        //doesnt work with model
        /*
        $post = new Post();
        
        $post->category = req->category;
        $post->name = req->name;
        $post->description = req->description;
        $post->user_id = req->user_id;
    
        $post->save();
        */
        $id = Auth::id(); 
        DB::insert('insert into posts (category, name, description, user_id) values (?, ?, ?, ?)', [$req->category,$req->name,$req->description, $id]);
        return redirect('/home');
    }
    public function all(){
        $data = Post::paginate(10);
        return view('home',['posts'=>$data]);
    }
    public function myposts(){
        $id = Auth::id(); 
        $data = DB::select('select * from posts where user_id = ?', [$id]);
        return view('myposts', ['posts'=>$data]);
    }
    public function delete($id = null){
        Post::where('id', $id)->delete();
        return  redirect('home');
    }
    public function find($skelbimas = null){
        $data = DB::select('select * from posts where id = ?', [$skelbimas]);
        return view('found', ['posts'=>$data]); 
    }
    public function moreInfo($id){
        $data = DB::select('select * from posts where id = ?', [$id]);
        return view('onepost', ['posts'=>$data]); 
    }
}
