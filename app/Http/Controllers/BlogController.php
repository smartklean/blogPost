<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $blogs = Blog::with('user')->get();

         return response()->json([
            'success' => true,
            'message' => 'Blogs retrieved successfully',
            'data' => $blogs
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'message' => $validator->errors(),
          ], 401);
        }

        $blog = Blog::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Blog created successfully',
            'data' => $blog
          ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('posts')->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Blog fetched successfully',
            'data' => $blog
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Blog updated successfully',
            'data' => $blog
          ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Blog deleted successfully',
            'data' => null
        ]);

    }
}
