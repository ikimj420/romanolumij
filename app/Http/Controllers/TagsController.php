<?php

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Blog;
use App\Models\Poem;
use App\Models\Story;

class TagsController extends Controller
{
    public function index($tag)
    {
        //get all tag for album
        $albums = Album::withAllTags([$tag])->get();
        //get all tag for poem
        $poems = Poem::withAllTags([$tag])->get();
        //get all tag for story
        $stories = Story::withAllTags([$tag])->get();
        //get all tag for blogs
        $blogs = Blog::withAllTags([$tag])->get();

        return view('tags.index', compact('albums', 'poems', 'stories', 'blogs'));
    }
}
