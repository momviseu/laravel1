<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorys;
use App\Models\posts;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        // return view('admin.post.indexPost');
        $posts = posts::all();

        return view('admin.post.indexPost', ['posts' => $posts]);
    }

    public function create(){
        $categories = categorys::all();

        // return view('admin.post.createPost');
        return view('admin.post.createPost', ['categories' => $categories]);
    }

    public function storePost(Request $request){

        $validated =$request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'category_id' => 'required|exists:categorys,id',
        ]);

        // $fileName = time().'.'.$request->image->getClientOriginalName();

        // $filepath = $request->file('image')->storeAs(
        //     'uploads',
        //     $fileName,
        //     'public'
        // );
        

        $post = new posts();
        $post->title = $request->title;
        $post->content = $request->content;
        // $post->image = $filepath;
        $post->category_id = $request->category_id;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('uploads', $filename);
            $post->image = $filename;
        }
        $post->save();

        // $post->categorys()->async($request->categorys);

        // return view('admin.post');
        return redirect()->route('admin.post.indexPost');
    }

    public function editPost($id){

        $post = posts::findOrFail($id);
        $categories = categorys::all();
        return view('admin.post.editPost', ['post' => $post, 'categories' => $categories]);
    }

    public function updatePost(Request $request, $id)
    {
        // dd($request, $id);
        $post = posts::findOrFail($id);
        
        $validated =$request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            // 'image' => 'required|mimes:jpg,jpeg,png|max:5048',
            'category_id' => 'required|exists:categorys,id',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        if($request->hasfile('image')){
            $destination = 'uploads'.$post->image;
            if(File:: exists($destination)){
                File:: delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('uploads', $filename);
            $post->image = $filename;
        }
        $post->save();
        return redirect()->route('admin.post.indexPost');

    }

    public function deletePost(Request $request, $id)
    {
        $post = posts::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.indexPost');

    }
}
