<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //Select * from categories WHERE slug = $slug
        // $category = Post::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        } else {
            return view('admin.categories.show', compact('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!$category) {
            abort(404);
        }
        $categories = Post::all();
        $posts = Post::all();
        return view('admin.categories.edit', compact('posts', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        #validating the name
        $request->validate([
            'name' => 'required',
        ]);
        $form_data = $request->all();
        if ($form_data['name'] != $category->name) {
            $slug = Str::slug($form_data['name'], '-');

            $slug_presente = Category::where('slug', $slug)->first();
            $contatore = 1;
            while ($slug_presente) {
                $slug = $slug . '-' . $contatore;
                $slug_presente = Category::where('slug', $slug)->first();
                $contatore++;
            }
            $form_data['slug'] = $slug;
        }

        $category->update($form_data);

        return redirect()->route('admin.categories.index')->with('inserted', 'La categoria è stata correttamente aggiornata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('deleted', 'Categoria eliminata');
    }
}
