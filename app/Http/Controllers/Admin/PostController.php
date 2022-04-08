<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

//Importazione STR
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();

        return view('admin.post.index', compact('posts', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Raccolgo tutte le categorie
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funzione di validazione
        $request->validate(
            [
            'title' => 'required|min:5',
            'content' => 'required|min:20',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
            ]
        );

        $data = $request->all();

        //Calcolo lo slug (campo unico) a partire dal titolo in modo che ogni articolo
        //abbia un riferimento univoco
        $slug = Str::slug($data['title']);

        $counter = 1;

        while(Post::where('slug', $slug)->first()) {

            $slug = Str::slug($data['title']) . '-' . $counter;
            $counter++;

        };

        $data['slug'] = $slug;

        $post = new Post();
        $post->fill($data);
        $post->save();

        //Metodo SYNC per aggiungere o rimuovere dati dalla tabella ponte, lo fa automaticamente anche in fase di edit
        $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        //Nella compact devo anche passare il parametro categories per fornire alla edit la lista delle categorie che ho raccolto
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required|min:5',
                'content' => 'required|min:20',
                'category_id' => 'nullable|exists:categories,id',
                'tags' => 'nullable|exists:tags,id'
            ]
        );

        $data = $request->all();

        $slug = Str::slug($data['title']);

        if ($post->slug != $slug) {
            $counter = 1;
            while (Post::where('slug', $slug)->first()) {
                $slug = Str::slug($data['title']) . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }

        
        $post->update($data);
        $post->save();

        $post->tags()->sync($data['tags']);
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
