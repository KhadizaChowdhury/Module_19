<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Post::with('user','category')->get();

        // $posts = Post::with('user','category')->paginate( 5 );
        // return view( 'pages.blogs' , compact('posts'));

        $posts = Post::with( 'user', 'category' )->paginate( 5 );
        return view( 'pages.blogs', compact( 'posts' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function allPosts()
    {

        //$posts = Post::with( 'user', 'category' )->paginate( 5 );
        $posts = Post::with( 'user', 'category' )->get();
        return response()->json( $posts );
    }

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */

    public function postDetails(string $id)
    {
        
        $post = Post::with( 'user', 'category' )->find( $id );

        if ( $post ) {
            $user = $post->user; // Retrieve the associated user
            if ( $user ) {
                $profile = $user->profile; // Retrieve the associated user profile
                if ( $profile ) {
                    // Access the profile attributes
                    $bloggerBio = $profile->bio;
                    // ...
                }
            }
        }

        $previousPost = Post::where( 'id', '<', $id )->orderBy( 'id', 'desc' )->first();
        $nextPost = Post::where( 'id', '>', $id )->orderBy( 'id', 'asc' )->first();

        return view( 'pages.post', compact( 'post', 'previousPost','nextPost', 'bloggerBio') );
    }

    public function show(string $id)
    {
        $blogPost = Post::with( 'user', 'category' )->find( $id );

        if ( $blogPost ) {
            $user = $blogPost->user; // Retrieve the associated user
            if ( $user ) {
                $profile = $user->profile; // Retrieve the associated user profile
                if ( $profile ) {
                    // Access the profile attributes
                    $bloggerBio = $profile->bio;
                    // ...
                }
            }
        }

        $previousPost = Post::where( 'id', '<', $id )->orderBy( 'id', 'desc' )->first();
        $nextPost = Post::where( 'id', '>', $id )->orderBy( 'id', 'asc' )->first();
        return response()->json($blogPost);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
