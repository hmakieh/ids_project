<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::with(['user', 'category', 'tags'])->paginate(10));
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post->load(['user', 'category', 'tags']));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }
        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}