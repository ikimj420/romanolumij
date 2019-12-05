<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use App\Models\Lexicon;
use App\Models\Poem;
use App\Models\Story;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $users = User::where('username','LIKE','%'.$request->search."%")
                            ->get();

            $poems = Poem::with('category')
                            ->where('alav','LIKE','%'.$request->search."%")
                            ->orWhere('title','LIKE','%'. $request->search. '%')
                            ->get();

            $stories = Story::with('category')
                                ->where('alav','LIKE','%'.$request->search."%")
                                ->orWhere('title','LIKE','%'.$request->search."%")
                                ->get();

            $lexicons = Lexicon::with('category')
                                ->where('rom','LIKE','%'. $request->search. '%')
                                ->orWhere('ser','LIKE','%'. $request->search. '%')
                                ->orWhere('eng','LIKE','%'. $request->search. '%')
                                ->get();

            $albums = Album::with('images')
                            ->where('name','LIKE','%'.$request->search."%")
                            ->get();

            $images = Image::where('name','LIKE','%'.$request->search."%")
                            ->get();


            if($users)
            {
                foreach ($users as $user)
                {
                    $output.='
                    <div class="pb-2">
                        <a href="/profile/'.$user->id.'-'.$user->username.'">'.$user->username.' - Profile</a>
                    </div>
                ';
                }
                foreach ($poems as $poem)
                {
                    $output.='
                    <div class="pb-2">
                    <a href="/poem/'.$poem->id.'-'.$poem->title.'">'.$poem->alav.' - '.$poem->title.' - Poem</a>
                    </div>
                ';
                }
                foreach ($stories as $story)
                {
                    $output.='
                    <div class="pb-2">
                    <a href="/story/'.$story->id.'-'.$story->title.'">'.$story->alav.' - '.$story->title.' - Story</a>
                    </div>
                ';
                }
                foreach ($lexicons as $lexicon)
                {
                    $output .= '
                    <div class="pb-2">
                        <a href="/lexicon/'.$lexicon->id.'-'.$lexicon->rom.'-'.$lexicon->eng.'-'.$lexicon->ser.'">'.$lexicon->rom .' _ '. $lexicon->ser .' _ '. $lexicon->eng .' - Lexicon</a>
                    </div>
                ';
                }
                foreach ($albums as $album)
                {
                    $output.='
                    <div class="pb-2">
                        <a href="/album/'.$album->id.'-'.$album->name.'">'.$album->name.' - Album</a>
                    </div>
                ';
                }
                foreach ($images as $image)
                {
                    $output.='
                    <div class="pb-2">
                        <a href="/image/'.$image->id.'-'.$image->name.'">'.$image->name.' - Image</a>
                    </div>
                ';
                }

                if(!empty($output))
                    return Response($output);
                else
                    return 'Nothing Found';
            }
        }
        return view('search.index');
    }
}