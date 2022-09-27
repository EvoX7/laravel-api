<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    // Validation Rules

    protected $validationRules = [
        'title' =>  'required|min:5|max:150',
        'post_img' => 'image',
        'post_content' => 'required|min:20',
        'post_date' => 'required|date',
        'tags' => 'exists:tags,id',
        'category_id' => 'nullable|exists:categories,id'

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('user_id', Auth::id())->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags', 'post'))->with('created', $post->title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate($this->validationRules);


        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $data['post_img'] = Storage::put('uploads', $data['post_img']);
        $post->post_content = $data['post_content'];
        $post->post_date = $data['post_date'];

        $post->fill($data);
        $post->save();
        $post->tags()->sync($data['tags']);



        return redirect()->route('admin.posts.index')->with('created', $post->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
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
        $data = $request->all();

        $validated = $request->validate($this->validationRules);
        $post = Post::findOrfail($id);

        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];

        $data['post_img'] = Storage::put('uploads', $data['post_img']);
        $post->post_content = $data['post_content'];
        $post->post_date = $data['post_date'];

        $post->save();
        $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'))->with('created', $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete($id);

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
