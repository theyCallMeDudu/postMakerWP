<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostRequest;
use App\ModelPost;
use App\ModelPhoto;
use App\User;

//require_once __DIR__ . 'blog/wordpress/wp-post/test.php';

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
            'post_date' => $request->post_date,
            'post_time' => $request->post_time,
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
            'post_date' => $request->post_date,
            'post_time' => $request->post_time,
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

    private function fileCatch(){
        $fileName = "blog/wordpress/wp-post/test.php";
        $content  = File::get($fileName);
        
        dd($content);
    }

    public function publish($id){
        include(app_path() . '\Scripts\wordpress\wp-post\test.php');

        // Gathering data from the item clicked on the table on Laravel
        $user_id = auth()->user()->id;
        $post_id = $this->objPost->find($id);
        $title = $this->objPost->find($id)->title;
        $content = $this->objPost->find($id)->content;
        $date = $this->objPost->find($id)->post_date;
        $time = $this->objPost->find($id)->post_time;
        $photo = $this->objPhoto->find($id)->image;

        $status = 'publish';
        $type = 'post';
        $categoryID = '5';
        $dateTime = date('Y-m-d H:i:s', strtotime("$date $time"));
        
        //dd($post_id, $title, $content, $date, $time, $photo);


        /*********************************************
        * WordPress array and variables for posting *
        *********************************************/

         $newPost = array(
            'post_title'    => $title,
            'post_content'  => $content,
            'post_status'   => $status,
            'post_date'     => $dateTime,
            'post_author'   => $user_id,
            'post_type'     => $type,
            'post_category' => array($categoryID)
        );

        // Publishing post on wordpress

        run('test.php');
    }
}
