<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $posts = Post::with('user')->get();
        return view('mustella-index', compact('posts'));
    }
  

    public function perfil()
    {

        $user = Auth::user();
        $userId = $user->id;
        $postCount = Post::where('user_id', $userId)->count();
      

        $posts = Post::where('user_id',Auth::id())->get();
        
        return view('perfil', compact('user', 'postCount', 'posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postagem');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'caption' => 'required|string',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         if ($request->hasFile('image') && $request->file('image')->isValid()) {
             $imagePath = $request->file('image')->store('images', 'public');

             Post::create([
                 'title' => $request->title,
                 'caption' => $request->caption,
                 'image_path' => $imagePath,
                 'user_id' => Auth::id(), // Atribui o ID do usuário autenticado
             ]);

             return redirect()->route('mustella')->with('MensagemCriadoPost', 'Seu post foi criado com sucesso.');
         } else {
             return back()->withErrors(['image' => 'Image upload failed.']);
         }
     }




    public function search(Request $request)
    {
        $query = $request->input('query'); // Captura o termo de busca
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                    ->orWhere('caption', 'LIKE', "%{$query}%")
                    ->get(); // Busca no banco de dados

        return view('pesquisa', compact('posts')); // Retorna a view com os resultados
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts-show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {

        $post = Post::findOrFail($id);
        return view('posts-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->caption = $request->input('caption');
        $post->save();
        return redirect()->route('perfil', $post->id)->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
       

        return redirect('/perfil')->with('MensagemDeletePost', 'Seu post foi excluído!');
    }
}
