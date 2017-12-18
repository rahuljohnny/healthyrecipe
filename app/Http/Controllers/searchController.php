<?php

namespace App\Http\Controllers;

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
        return view('recipes');
    }


    public function recipe($name){ //$recipeName

        $nameTemp = $name;
        for ($i = 0; $i < strlen($name); $i++) {

            if($name[$i]=='_')
                $name[$i] = ' ';

           //echo "The number is: "+$name[$i]+"<br>";
        }


        //dd($name);
        return view('recipe',compact(['name','nameTemp']));
    }


    public function storeValue(){

        $input = request()->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
        //return response()->json(['message' => 'Post POstooooooo'],200);
    }





}


