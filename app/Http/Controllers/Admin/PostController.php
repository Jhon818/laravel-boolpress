<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; //classe per utilizzare dei metodi (tipo per creare lo slug)
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Per prima cosa valido i dati che arrivano dal form
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'author' => 'required',
            'tags' => 'exists:tags,id'
        ]);
        
        $form_data = $request->all();
        // dd($form_data);

        $new_post = new Post();
        $new_post->fill($form_data);

        //Metodo per creare lo slug in automatico
        $slug = Str::slug($new_post->title,'-');
        $slug_base = $slug;

        $slug_presente = Post::where('slug', $slug)->first();

        $contatore=1;

        while($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Post::where('slug', $slug)->first();
            $contatore++;
        }

        $new_post->slug = $slug;
        $new_post->save();

        $new_post->tags()->attach($form_data['tags']);
        
        return redirect()->route('admin.posts.index')->with('status','Il post è stato inserito correttamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //Select * from posts WHERE slug = $slug
        $post = Post::where('slug', $slug)->first();
        if(!$post) {
            abort(404);
        } else {
            return view('admin.posts.show', compact('post'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'author' => 'required'
        ]);
        $form_data = $request->all();
        //Verifico se il titolo ricevuto dal form è diverso dal vecchio
        if($form_data['title'] != $post->title) {
            //è stato modificato il titoo, quindi devo modificare anche lo slug
            $slug = Str::slug($form_data['title'],'-');
            // $slug_base = $slug;

            $slug_presente = Post::where('slug', $slug)->first();

            $contatore= 1;

            while($slug_presente) {
                $slug = $slug . '-' . $contatore;
                $slug_presente = Post::where('slug', $slug)->first();
                $contatore++;
            }
            $form_data['slug'] = $slug;
        }

        $post->update($form_data);

        if (array_key_exists('tags' , $form_data)) {
            $post->tags()->sync($form_data['tags']);
        }
        else
        {
            $post->tags()->sync([]);
        }
       

        return redirect()->route('admin.posts.index')->with('status','post modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach($post->id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status','Post eliminato');
    }
}