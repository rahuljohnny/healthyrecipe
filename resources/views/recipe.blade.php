@include('layout.headerTwo')
        <!DOCTYPE html>
<html lang="en">

    <head>

        {{--Some for headers--}}
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title','recipe')
        </title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{--Some for headers--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>

    <body>

    <div class="col-md-6 col-lg-6 col-sm-12  col-md-offset-3 col-lg-offset-3">
        <div class="dialogmsg alert-success" id="saved" title="Saved"></div>
        <div class="dialogerr alert-danger" id="presSaved" title="Saved Previously"></div>
    </div>

    <div class="col-md-12 col-lg-12 col-sm-12" id="searchForm">
        @include('partials.errors')
        <div class="form-group">
            <input type="hidden" id="token" value="{{csrf_token()}}">
            <input type="text" class="hidden" placeholder="search" id="searchBar">
            <input type="text" class="hidden"  id="nameNew" value="{{$name}}">
        </div>

    </div>


    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-md-offset-3 col-lg-offset-3">

        <div class="resultContainer"></div>
        {{--##############################################################################################################--}}

        <div class="list-group col-md-12" xmlns="http://www.w3.org/1999/html">
            <a href="recipe/' + urlForEachTemp + '" class="list-group-item active" id="oneA">

            </a>

            <br>


            <div class="col-md-12">

                <div class="col-md-6" id="infos"></div>

                <div class="col-md-6">
                    <div class="img-wrapper" id="wrapedImage"></div>
                </div>

            </div>
        </div>

        {{--##############################################################################################################--}}
        <h3 class="Ingredients text-info col-md-offset-1"></h3>

        <div class="row">

            <div class="col-md-6 col-md-offset-1">
                <div class="ingredientLines"></div>
            </div><br><br>

            <div class="col-md-4">
                <form class="form-group" id="postForm3" method="post">
                    <button type="button" class="addIcon" id="addToFavButton"></button>
                </form>
            </div>

        </div>
    </div>





    <script src="{{asset('dist/js/vendor/jquery.js')}}"></script> {{--It prevents page from getting refreshed--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>


    var checkIfSearchResulsExist;

    var urlN = '{{route('addtofav')}}';


    var urlAddToFav = '{{route('addtofav')}}';
    var token = $('#token').val();
    var nameToFav,urlToFav,imageUrlToFav,caloriesToFav;


        var formValue = '{{$name}}';
        var nameToFav = 'nirdosh';
        var urlToFav = 'nirdosh';
        var imageUrlToFav = 'nirdosh';


        getSearchKey(formValue);

        function getSearchKey(searchKey){

            $('.resultContainer').html('');

            var searchedItem;
            var count = 0;
            var recipe;
            $.ajax({
                type: 'GET',
                async: false,


                url: 'https://api.edamam.com/search?' +
                'q=' + searchKey + '&app_id=3e043da3&app_key=\n' +
                '91bbacb3992f0099181b6a1385ebab3f\t\n&from=0&to=20&calories=gte%20591,%20lte%20722&health=alcohol-free',

                success: function (d){
                    searchedItem = d.hits;
                }
            });

            searchedItem.map(function (item) {
                recipe = item.recipe;
                var recipeNew = recipe.label;
                var urlForEach = recipe.label;
                var urlForEachTemp;
                reciName = recipe.uri;
                var indexOfUnderscore = reciName.indexOf("_");
                var urlForEachTemp = reciName.substring(indexOfUnderscore + 1, reciName.length);
                if (urlForEachTemp.valueOf() == searchKey.valueOf()) {

                    checkIfSearchResulsExist = 1;

                    count = 1;

                    $('#oneA').append(
                        '<a href="recipe/' + urlForEachTemp + '" class="list-group-item active">' +
                        '<div class="itemBar">' +
                        '<h3 class="text-center">' + recipe.label + '</h3>' +
                        '</div>' +
                        '</a>'
                    );

                    $('#infos').append(
                        '<div class="col-md-9">'
                        + '<ul><h3 class="text-success">Health Label: ' +
                        recipe.healthLabels[0]
                        + '</ul></h3>'

                        + '<ul><strong>' + recipe.totalNutrients.CA.label + ':  ' +
                        recipe.totalNutrients.CA.quantity + ' ' + recipe.totalNutrients.CA.unit
                        + '</ul></strong>' +

                        '<ul class="text-danger"><strong> Calories: ' +
                        recipe.calories
                        + '</strong></ul>' +
                        '</div>'
                    );

                    $('#wrapedImage').append(
                        '<div class="img-wrapper">' +
                        '<img src="' + recipe.image + '" alt="Dish">'
                        + '</div>'
                    )


                    $('.Ingredients').append(
                        'Ingredients:');

                    $('.addIcon').append('' +
                        '<div class="faPlus">'+
                        '<i class="fa fa-plus-square fa-5x col-md-offset-2 " aria-hidden="true" style="color: #54163e">' + '</i>' +
                        '<h4 class="text-success">' + 'Add to Favourites' + '</h4>'
                        +'</div>'
                    );

                    var i;
                    for (i = 0; i < recipe.ingredientLines.length; i++) {
                        $('.ingredientLines').append(
                            '<h4 class="text-success">' + (i + 1) + '. ' + recipe.ingredientLines[i] + '</h4>'
                        );
                    }
                    nameToFav = recipeNew;
                    urlToFav = searchKey;
                    imageUrlToFav = recipe.image;
                }
            });

        }




        $("#addToFavButton").on('click',function () {
            addToFav();
        });

        function addToFav(){
            $('.dialogmsg').html('');
            $('.dialogerr').html('');




            $.ajax({
                type: 'POST',
                url: urlN,
                data: "name=" + nameToFav + "&url=" + urlToFav + "&imageUrlToFav=" + imageUrlToFav + "&_token=" + token,

                success:function (data){
                    console.log(data);
                    if(data == '0')
                    {
                        $('.dialogerr').append(
                            '<strong><h3>'+'This item is already added!!'+'</h3></strong>'
                        ).fadeOut(3000);

                        $('.addIcon').html(
                            '<b>'+'Added Already'+'</b>'
                        );
                        //$('.dialogerr').fadeOut(3000);

                    }
                    else if(data == '1'){
                        $('.dialogmsg').append(
                            '<strong><h3>'+'Added to favourits!!'+'</h3></strong>'
                        ).fadeOut(3000);

                        $('.addIcon').html(
                            '<b>'+'Added Successfully'+'</b>'
                        );
                    }
                }
            });
        }
</script><hr>

    @include('layout.footer')


</body>

</html>



