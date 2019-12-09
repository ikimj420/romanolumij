<?php

namespace App\Http\Controllers;

use App\Models\Album;
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


            if($users)
            {
                foreach ($users as $user)
                {
                    $output.='
                    <div class="col-md-3 mb-2">
                        <div class="card text-center">
                            <a href="/profile/'. $user->id .'-'.$user->username.'">
                                <div class="card-img">
                                    <div class="image-wrap">
                                        <img src="'. $user->userPics() .'" alt="'. $user->username .'" class="rounded img-fluid image image-2 image-full">
                                    </div>
                                </div>
                                <div class="card-body pb-5">
                                    <h5 class="card-title mb-0 text-success">'. $user->username .'</h5>
                                </div>
                            </a>  
                        </div>
                    </div> 
                ';
                }
                foreach ($poems as $poem)
                {
                    $output.='
                    <div class="col-md-3 mb-2">
                        <div class="card text-center">
                            <a href="'. $poem->pathAlav() .'">
                                <div class="card-img">
                                    <div class="image-wrap">
                                        <img src="'. $poem->poemPics() .'" alt="'. $poem->title .'" class="rounded img-fluid image image-2 image-full">
                                    </div>
                                </div>
                                <div class="card-body pb-5">
                                    <h5 class="card-title mb-0 text-success">'. $poem->alav .'</h5>
                                    <h5 class="card-title mb-0 text-success">'. $poem->title .'</h5>
                                </div>
                            </a>  
                        </div>
                    </div> 
                ';
                }
                foreach ($stories as $story)
                {
                    $output.='
                    <div class="col-md-3 mb-2">
                        <div class="card text-center">
                            <a href="'. $story->pathAlav() .'">
                                <div class="card-img">
                                    <div class="image-wrap">
                                        <img src="'. $story->storyPics() .'" alt="'. $story->title .'" class="rounded img-fluid image image-2 image-full">
                                    </div>
                                </div>
                                <div class="card-body pb-5">
                                    <h5 class="card-title mb-0 text-success">'. $story->alav .'</h5>
                                    <h5 class="card-title mb-0 text-success">'. $story->title .'</h5>
                                </div>
                            </a>  
                        </div>
                    </div> 
                ';
                }
                foreach ($lexicons as $lexicon)
                {
                    $output .= '  
                    <div class="col-md-3 mb-2">
                        <div class="card text-center">
                            <a href="'. $lexicon->pathTitle() .'">
                                <div class="card-img">
                                    <div class="image-wrap">
                                        <img src="'. $lexicon->lexiconCategoryPics() .'" alt="'. $lexicon->ser .'" class="rounded img-fluid image image-2 image-full">
                                    </div>
                                </div>
                                <div class="card-body pb-5">
                                    <h5 class="card-title mb-0 text-success">'. $lexicon->rom .'</h5>
                                    <h5 class="card-title mb-0 text-success">'. $lexicon->ser .'</h5>
                                    <h5 class="card-title mb-0 text-success">'. $lexicon->eng .'</h5>
                                </div>
                            </a>  
                        </div>
                    </div>           
                ';
                }
                foreach ($albums as $album)
                {
                    $output.='
                    <div class="col-md-3 mb-2">
                        <div class="card text-center">
                            <a href="'. $album->pathTitle() .'">
                                <div class="card-img">
                                    <div class="image-wrap">
                                        <img src="'. $album->albumPics() .'" alt="'. $album->name .'" class="rounded img-fluid image image-2 image-full">
                                    </div>
                                </div>
                                <div class="card-body pb-5">
                                    <h5 class="card-title mb-0 text-success">'. $album->name .'</h5>
                                </div>
                            </a>  
                        </div>
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
