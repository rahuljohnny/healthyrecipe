<?php



Route::get('/','searchController@recipes')->name('recipes');


Route::post('/searchresultstore','searchController@searchResultStore')->name('searchresultstore');
Route::post('/searchresultstoretwo','searchController@searchResultStoreTwo')->name('searchresultstore');

Route::get('/storevalue','searchController@storeValue')->name('storeValue');
Route::get('/recipe/{recipeName}','searchController@recipe')->name('recipe');


Route::get('/userprofile','FavrecipesController@profile')->name('user.profile');

Route::get('/create','FavrecipesController@create');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function (){

    Route::get('/logout','UserController@getLogout')->name('logout');


    //Route::get('/addtofav/{itemName}','FavrecipesController@addtofav')->name('addtofav');
    Route::post('/addtofav','FavrecipesController@addtofav')->name('addtofav');
    Route::get('/delete/{id}','FavrecipesController@destroy')->name('dish.destroy');

});


Route::get('/store','FavrecipesController@store');


Route::get('/search/{searchKey}','FavrecipesController@search');
//Route::post('/store','FavrecipesController@store');