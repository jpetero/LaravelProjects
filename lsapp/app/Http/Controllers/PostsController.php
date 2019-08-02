<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Bring in the model and all its function
use App\Post;

// This allows you to perform sql queries
use DB;

class PostsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* 
        This allows only the authenticated users to access the routes handled by the 
        PostsController i.e. index, create, store, edit, update, show and destroy
    */
    public function __construct()
    {
        // This allows the guest to accessed all the other 7 functions except index() and show()
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // You perform sql operations using the SQL queries
        // $posts = DB::select("SELECT * FROM posts");
        // Using eloquent method, also after the return keyword the function stops execution
        // return Post::all(); 

        // Fetch all the records
        // $posts = Post::all(); 

        // This fetch the data and order them in descending order with respect to the title 
        // And the time at  which they are created

        // This will return the post with the given title
        // return Post::where("title", "Post Two")->get();

        // This will take only the first post
        // $posts = Post::orderBy("title", "desc")->take(1)->get();

        // The pagination will kick when we hit more than 1 entries
        // $posts = Post::orderBy("title", "desc")->paginate(1);
        
        // Return the view
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("posts.index")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',

            // This allows image of less than 2MB and it can also be optional 
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with extension using Laravel
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just the filename using pure php
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just the filename using Laravel
            $extension = $request->file('cover_image')->getClientOriginalExtension();

             //file name to store to the database
             $fileNameToStore = $filename . '_' . time() . '.' . $extension;

             // Upload the image
             // cover_images folder is created in the storage/app/public
             // The browser can access this folder when in public
             $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else{
            //file name to store to the database
            $fileNameToStore = 'noimage.jpg';
        }
            
        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // Add a user_id field in the post table
        $post->user_id = auth()->user()->id;

        // Add the filename to the database
        $post->cover_image = $fileNameToStore;

        $post->save();

        // Redirect to the posts page
        // Using with(), the first parameters is how you want the content to be accessed in 
        // the template and the second is the variable or content in the current page
        return redirect('./posts')->with('success', 'Post Created');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("posts.show")->with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for a correct user to edit the post
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        // If the user is editing his own page
        return view("posts.edit")->with("post", $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',

            // This allows image of less than 2MB and it can also be optional 
            'cover_image' => 'image|nullable|max:1999'
        ]);

         // Handle file upload
         if($request->hasFile('cover_image')){
            // Get filename with extension using Laravel
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just the filename using pure php
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just the filename using Laravel
            $extension = $request->file('cover_image')->getClientOriginalExtension();

             //file name to store to the database
             $fileNameToStore = $filename . '_' . time() . '.' . $extension;

             // Upload the image
             // cover_images folder is created in the storage/app/public
             // The browser can access this folder when in public
             $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
            
        // Update a post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
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

        // Check for a correct user to delete the post
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        // Delete the image with other filename
        if ($post->cover_image != 'noimage.jpg'){
            // Delete the image
            Storage::delete('public/cover_image/' . $post->cover_image);

        }

        // The post creator can delete his post
        $post->delete();
        return redirect('./posts')->with('success', 'Post Removed');
    }
}
