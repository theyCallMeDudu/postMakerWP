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
        $post = $this->objPost->all();
        return view('index', compact('post'));
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
        $cad = $this->objPost->create([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' =>$request->id_user
        ]);

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
        $this->objPost->where(['id' => $id])->update([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' =>$request->id_user
        ]);
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
