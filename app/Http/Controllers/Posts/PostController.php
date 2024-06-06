<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts\Post;
use Illuminate\Support\Facades\Validator;

use Auth;

class PostController extends Controller
{

    public function index(){
        $posts = Post::where('user_id', '=', (Auth::user()->id ?? 0))->with('user')->orderBy('id', 'DESC')->get()->toArray();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $data = $request->all();
        $image = $request->file('image');

        $rules = [
            "title" => 'required',
            "description" => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect('/posts/create')->withErrors($validator)->withInput();
        }

        $imageName = base64_encode("post_".uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/assets/img/posts'), $imageName);
        $data['image'] = $imageName;

        $postId = $this->createPost($data);

        if ($postId > 0) {
            return redirect()->back()->with('msg', json_encode(array("Post Information", "Post has been created successfully.", "success")));
        }
        else{
            return redirect()->back()->with('msg', json_encode(array("Post Information", "Something went wrong.", "danger")));
        }
    }


    public function show(string $id){
        $id = base64_decode($id);
        $post = Post::find($id)->with('user')->get()->toArray();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);
        $post = Post::find($id)->with('user')->get()->toArray();
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $rules = [
                "title" => 'required',
                "description" => 'required',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $id = base64_decode($id);
            $post = Post::find($id);

            if($post){
                $oldImageName = $post->image;
                $oldImagePath = public_path('/assets/img/posts/').$oldImageName;
                $image = $request->file('image');

                $newImageName = base64_encode("post_".uniqid()).'.'.$image->getClientOriginalExtension();

                $post->title = $request->input('title');
                $post->description = $request->input('description');

                if ($request->hasFile('image')) {
                    $post->image = $newImageName;
                    $image->move(public_path('/assets/img/posts'), $newImageName);
                    if(file_exists($oldImagePath)) unlink($oldImagePath);
                }

                $post->save();

                return redirect()->back()->with('msg', json_encode(array("Post Information", "Post has been updated successfully.", "success")));
            }

        } catch (Throwable $e) {
            report($e);

            return redirect()->back()->with('msg', json_encode(array("Post Information", "Something went wrong.", "danger")));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $id = base64_decode($id);
            Post::where('id', $id)->delete();
            return response()->json([
                'return' => true,
                'title' => 'Post Information',
                'message' => 'Post has been deleted successfully.',
                'type' => 'success',
            ]);
        }
        catch (Throwable $e) {
            report($e);
            return response()->json([
                'return' => false,
                'title' => 'Post Information',
                'message' => 'Something went wrong.',
                'type' => 'danger',
            ]);
        }
    }

    private function createPost(array $data)
    {
        return Post::insertGetId([
            "user_id" => Auth::user()->id,
            "title" => $data['title'],
            "description" => $data['description'],
            "image" => $data['image'],
            "created_at" => date('Y-m-d h:i:s'),
            "status" => "Approved"
        ]);
    }
}
