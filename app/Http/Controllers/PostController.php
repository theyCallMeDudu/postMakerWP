<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\ModelPost;
use App\User;

class PostController extends Controller
{

    private $objUser;
    private $objPost;

    public function __construct(){
        $this->objUser = new User();
        $this->objPost = new ModelPost();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         //$post = $this->objPost->all();
        //$post = $this->objPost->orderBy('created_at', 'desc')->paginate(5);
        $user_id = auth()->user()->id;
        $post = $this->objPost->where('id_user', '=', $user_id)->orderBy('created_at', 'desc')->paginate(10);
        $quantity = $this->objPost->where('id_user', '=', $user_id)->get()->count();

        return view('index', compact('post', 'quantity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //$data = $request->all();
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        $cad = $this->objPost->create([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' =>$user_id
        ]);


        //$post = $user->relPosts()->create($data);
        
        flash('Postagem criada com sucesso')->success();
        if($cad){
            return redirect('posts');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->objPost->find($id);
        $users = $this->objUser->all();
        return view('create', compact('post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $user_id = auth()->user()->id;

        $this->objPost->where(['id' => $id])->update([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' =>$user_id
        ]);

        flash('Postagem atualizada com sucesso')->success();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
