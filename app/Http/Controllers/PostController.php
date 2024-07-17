<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($blogId)
    {
        $posts = Post::where('blog_id', $blogId)->get();

        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts,
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog_id = $request->route('blogId');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }

        $request->merge([
           'blog_id'=> $request->route('blogId')
          ]);

        $post = Post::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post
          ]);

    }

    /**
     * Display the specified resource.
     */
    public function show( string $postId)
    {
        $blogId =  $request->route('blogId');
        $post = Post::with(['comments', 'likes'])->where('blog_id', $blogId)->findOrFail($postId);
        return response()->json([
            'success' => true,
            'message' => 'Post fetched successfully',
            'data' => $post
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $postId)
    {
        $blogId =  $request->route('blogId');
        $post = Post::where('blog_id', $blogId)->findOrFail($postId);
        $post->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Post Updated successfully',
            'data' => $post
          ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $postId)
    {
        $blogId =  $request->route('blogId');
        $post = Post::where('blog_id', $blogId)->findOrFail($postId);
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully',
            'data' => null
        ]);

    }
}
