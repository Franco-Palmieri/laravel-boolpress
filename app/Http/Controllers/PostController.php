<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $posts = Post::all(); 
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
            Prendo i parametri della request inviata dal create
            creo un nuovo oggetto dal model Post
            imposto i parametri con i dati della request
        */

        //validazione url
        //tutto ciò che non è validato va in errore
        $request->validate([
            'image' => 'url'
        ]);
        $data = $request->all(); //ritornano tutti i parametri come un array

        $post = new Post();
        
        $this->savePost($post, $data);

        //ritorna al post appena creato
        //l'id viene generato dopo il save
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //invia l'id di ogni post al file show
        //ritorna i dati di ogni post in base all'id

        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
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
        $data = $request->all();
        
        //$post->update($data); 
        // nel model per evitare problemi devo spalmare i campi che possono essere modificati
        //oppure creo un metodo da riutilizzare

        $this->savePost($post, $data);

        return redirect()->route('posts.show', $post->id);
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

        return redirect()->route('posts.index');
    }

    //MY FUNCTIONS
    private function savePost($post, $data)
    {
        $post->name = $data['name'];
        $post->body = $data['body'];
        $post->image = $data['image'];
        $post->save();
    }
}
