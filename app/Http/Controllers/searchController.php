<?php

namespace App\Http\Controllers;

use App\Favrecipes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class searchController extends Controller
{

    public function searchResultStore(Request $request){
        dd($request->all());
    }
    public function searchResultStoreTwo(Request $request){
        dd($request->all());
    }

    public function recipes(){
        $recipes = Favrecipes::all();
        $dt     = Carbon::now();

        return view('recipes',compact(['recipes','dt']));
    }


    public function recipe($name){ //$recipeName

        $nameTemp = $name;

        return view('recipe',compact(['name','nameTemp']));
    }


    public function storeValue(){

        $input = request()->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
        //return response()->json(['message' => 'Post POstooooooo'],200);
    }





}


