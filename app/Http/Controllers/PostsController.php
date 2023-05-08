<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index')
        ->with('posts', Post::get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()) {
            return view('blog.create');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'description' =>'required|string|max:2000',
            'image' => 'required|mimes:png,jpg,svg,jpeg,gif|max:5048',
        ]);

        $slug = Str::slug($request->title, '-');

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        

        Post::create([
            'title' => $request->input('title'),
            'slug' => $slug,
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {

        $post = Post::where('slug', $slug)->first();

        if(Auth::user() && Auth::user()->id == $post->user_id){
            return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
        }
        else{
            return redirect('/blog/' . $slug);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug);

        if (!$post) {
            return redirect('/blog')->with('error', 'Post not found');
        }

        $request->validate([
            'title' =>'required|string|max:255',
            'description' =>'required|string|max:2000',
            // 'image' => 'mimes:png,jpg,svg,jpeg,gif|max:50000'
        ]);

        
        $slug = Str::slug($request->title, '-');
        
        

        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $post->update([
                'image_path' => $newImageName,
            ]);
        }

        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog/'. $slug)->with('message', 'Post Has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            return redirect('/blog')->with('error', 'Post not found');
        }

        $post->delete();

        return redirect('/blog')->with('message', 'Post Has been Deleted successfully');
    }
}
