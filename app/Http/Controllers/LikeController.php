<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;
class LikeController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        $like = Like::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Like established successfully',
            'data' => null
          ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $blogId, string $postId, string $likeId)
    {
        $like = Like::where('post_id', $postId)->findOrFail($likeId);
        $like->delete();

        return response()->json([
            'success' => true,
            'message' => 'Like deleted successfully',
            'data' => null
          ]);

    }
}
