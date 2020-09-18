<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\ModelPost;
use App\ModelPhoto;
use App\User;

class PostController extends Controller
{

    private $objUser;
    private $objPost;

    public function __construct(){
        $this->objUser = new User();
        $this->objPost = new ModelPost();
        $this->objPhoto = new ModelPhoto();
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

    private function imageUpload(PostRequest $request){
        $image = $request->file('image');
        $content = $image->store('post_image', 'public');

        return $content;
    }

    public function store(PostRequest $request)
    {
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        $cad = $this->objPost->create([
            'title' => $request->title,
            'content' => $request->content,
            'id_user' =>$user_id
        ]);

        flash('Postagem '.$cad->id .' criada com sucesso')->success();

        if($cad){
            if($request->hasFile('image')){
                $image = $this->imageUpload($request);
    
                // inserção da imagem/ referência na base
                $this->objPhoto->create([
                    'image' => $image,
                    'id_post' => $cad->id
                ]);
            }
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

        if($request->hasFile('image')){
            $image = $this->imageUpload($request);

            $this->objPhoto->create([
                'image' => $image,
                'id_post' => $id
            ]);
        }

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
