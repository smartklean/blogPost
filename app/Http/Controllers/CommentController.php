<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }

        $request->merge([
            'post_id'=> $request->route('postId')
           ]);

        $comment = Comment::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully',
            'data' => $comment
          ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $blogId, string $postId, string $commentId)
    {
        $comment = Comment::where('post_id', $postId)->findOrFail($commentId);
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully',
            'data' => null
        ]);

    }
}
