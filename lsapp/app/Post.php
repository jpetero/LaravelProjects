<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Change the table from posts which is the default to the one you want
    protected $table = "posts";

    // Change the primary key
    public $primaryKey = "id";

    // Timestamp is true by default
    public $timestamps = true;

    // Creating the relationship
    // This means a single post belongs to a specific user
    public function user(){
        return $this->belongsTo('App\User');

        // To access the user
        // $post->user->name
    }
}