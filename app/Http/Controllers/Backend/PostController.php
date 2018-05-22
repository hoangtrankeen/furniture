<?php

namespace App\Http\Controllers\Backend;


use App\Model\Tag;
use App\Model\Topic;
use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public $photo_path;

    public function __construct(Post $post)
    {
        $this->photo_path = $post->photo_path;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('backend/post/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['topics'] = Topic::all();
        $data['tags'] = Tag::all();
        return view('backend/post/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            // rules, criteria
            'title'          => 'required|max:190',
            'description'    => 'required|max:190',
            'slug'           => 'required|alpha_dash|min:5|max:190|unique:posts,slug',
            'image'          => 'nullable|image',
            'post_content'   => 'required',
            'active'         => 'required',
            'featured'       => 'required'
        ));

        //save image
        if($request->hasFile('image')){
            $photo = $request->file('image');

            if (!is_dir($this->photo_path)) {
                mkdir($this->photo_path, 0777);
            }

            $name = sha1(date('YmdHis') . str_random(30));
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
            $feature_image = $resize_name;
            Image::make($photo)->save($this->photo_path . '/' . $resize_name);


        }else{
            $feature_image = '';
        }

        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->active = $request->active;
        $post->featured = $request->featured;
        $post->content = $request->post_content;
        $post->image = $feature_image;
        $post->save();

        $post->tags()->sync($request->tags, false);

        $post->topics()->sync($request->topics, false);

        Session::flash('success', 'The post was successfully save!');

        //redirect to another page
        return redirect()->route('post.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
