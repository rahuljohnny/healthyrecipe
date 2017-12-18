<?php

namespace App\Http\Controllers;

use App\Favrecipes;
use Illuminate\Http\Request;
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

    public function addtofav($name)
    {
        $nameTempTwo = $name;
        for ($i = 0; $i < strlen($name); $i++) {

            if($name[$i]=='_')
                $name[$i] = ' ';

            //echo "The number is: "+$name[$i]+"<br>";
        }


        $alreadyAdded = Favrecipes::where([
            ['user_id', '=', auth()->id()],
            ['recipeLabel', '=', $name]
        ])->get();




        if (!$alreadyAdded->count()) {

            //TODO ############################################################



            $favRecipes = new Favrecipes;

            $favRecipes->recipeLabel = $name;
            $favRecipes->user_id = auth()->id();




            $favRecipes->save();

            return redirect()->back()->with(['message' => "Added to favourites!!"]);
        }
        else{
            return redirect()->back()->with(['error' => "It's already added to favourites!!"]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                return redirect()->to('user\profile')->with(['message' => "Unliked dish!!"]);
            }
            return back()->withInput()->with('Error','Dish could not be Unliked!!');
        }
        return redirect()->to('user\profile')->with(['error' => "You don't have this permission!"]);

        }
}
