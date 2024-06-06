<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_signed_in_user_can_create_post(){
        // Create & Sign In User
        $this->getSignedInUser();

        // Get created product
        $this->insertPost();
    }

    public function test_signed_in_user_can_update_post(){

        // Create & Sign In User
        $this->getSignedInUser();

        // Get created product
        $this->insertPost();

        Storage::fake('public/assets/img/posts');
        $imageName = base64_encode("post_" . uniqid()) . '.jpg';

        $image = UploadedFile::fake()->image($imageName);

        // Update a post
        $this->post(route('posts.update', $this->post->id), [
            'title' => "Post 1 Updated",
            'description' => Str::random(50) . " Updated",
            'status' => 'Rejected',
            'image' => $image,
        ]);

        $post = Post::first();

        $this->assertEquals('Post 1 Updated', $post->name);

    }

    public function test_signed_in_user_can_delete_post(){
        // Create & Sign In User
        $this->getSignedInUser();

        // Get created post
        $this->insertPost();

        // Delete a post
        $this->post(route('posts.delete', $this->post->id));
    }
}
