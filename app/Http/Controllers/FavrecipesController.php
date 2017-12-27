<?php

namespace App\Http\Controllers;

use App\Favrecipes;
use Carbon\Carbon;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavrecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);
    }

    public function addtofav(Request $request)
    {
        //return $request['url'];

        $newFav = new Favrecipes;
        $newFav->user_id = auth()->id();
        $newFav->recipeLabel = $request['name'];
        $url = $newFav->uniqueUrl = $request['url'];
        $newFav->imageUrl = $request['imageUrlToFav'];
        $newFav->created_at = Carbon::now();

        //If its already added
        $alreadyAdded = Favrecipes::where([
            ['user_id', '=', auth()->id()],
            ['uniqueUrl', '=', $url]
        ])->get();




        if (!$alreadyAdded->count()) {
            $newFav->save();
            return "1";

            //return with(['message' => "Added to favourites!!"]);
        }
        else{
            return "0";
            //return response()->json(['message','Previously added!!!'],200);

            //return redirect()->back()->with(['error' => "It's already added to favourites!!"]);
            //return with(['error' => "It's already added to favourites!!"]);
        }
    }

    /*
     *
     */

    public function profile()
    {
        $favDishes = Favrecipes::where('user_id', '=', auth()->id())->get();
        $userName = Auth::user()->name;

        return view('user.index',compact(['favDishes','userName']))->with(['message' => "Logged In"]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.ajaira');
    }

    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favrecipes  $favrecipes
     * @return \Illuminate\Http\Response
     */
    public function show(Favrecipes $favrecipes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favrecipes  $favrecipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Favrecipes $favrecipes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favrecipes  $favrecipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favrecipes $favrecipes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favrecipes  $favrecipes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $dishToDelete = Favrecipes::find($id);

        if($dishToDelete->user_id == Auth::id()){

           if($dishToDelete->delete()){
                return redirect()->to('userprofile')->with(['message' => "Unliked dish!!"]);
            }
            return back()->withInput()->with('Error','Dish could not be Unliked!!');
        }
        return redirect()->to('userprofile')->with(['error' => "You don't have this permission!"]);

        }
}
