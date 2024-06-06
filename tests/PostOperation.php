<?php
namespace Tests;
use App\Models\Posts\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait PostOperation{

    public $post;

    public function insertPost(){

        Storage::fake('public/assets/img/posts');
        $imageName = base64_encode("post_".uniqid()).'.jpg';

        $image = UploadedFile::fake()->image($imageName);
        $title = Str::random(20);

        // Add new post
        $this->post(route('posts.create'),[
            'user_id' => 1,
            'title' => $title,
            'description' => Str::random(50),
            'image' => $image,
            'status' => 'Approved'
        ]);

        # works if the refresh database is on
         $this->assertEquals(1, Post::count());

        // Get inserted post and validate
        $this->post = Post::first();
        $this->assertEquals($this->post->user_id, $this->user->id);
        $this->assertEquals($this->post->title, $title);
    }

}
