@include('layout.headerTwo')

<!DOCTYPE html>
<html lang="en">

<head>

    {{--Some for headers--}}
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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


    <div class="col-md-6 col-md-offset-3"></div>


<div class="col-md-12 col-lg-12 col-sm-12" id="searchForm" >
    @include('partials.errors')
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="hidden" placeholder="search" id="searchBar">
            <input type="text" class="hidden"  id="nameNew" value="{{$name}}">
        </div>
    <button type="button" id="buttonClicked" class="btn btn-success col-md-8 col-md-offset-2" onclick="loading(); searchValue()"><h3>Click for details of >> </h3> <h1><strong>{{$name}}</strong></h1></button>
</div>
{{--curl "https://api.edamam.com/search?q=chicken&app_id=${YOUR_APP_ID}&app_key=${YOUR_APP_KEY}&from=0&to=3&calories=gte%20591,%20lte%20722&health=alcohol-free"--}}


<button type="button" id="buttonClicked2" class="btn btn-success col-md-8 col-md-offset-2"><h3>Ajaira button</h3></button>


<div class="col-md-8 col-lg-8 col-sm-8  col-md-offset-2 col-lg-offset-2">



    <div class="resultContainer" onclick="show($url)"></div><hr>


    <div class="row col-md-offset-2 col-md-10">

        <h2 class="Ingredients"></h2>

        <div class="col-md-8">
            <div class="ingredientLines"></div>
        </div>

        <div class="col-md-4 pull-right">
            <a href="/addtofav/{{$nameTemp}}">
                <div class="addIcon"></div>
            </a>
        </div>


    </div>


</div>


<script src="{{asset('dist/js/vendor/jquery.js')}}"></script> {{--It prevents page from getting refreshed--}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<script>



    $('button').hide(); //will hide all the elements that have the class = button
    $('button#buttonClicked2').hide(); //will hide the element that have the id = 'buttonClicked2' and class = button





    function getSearchKey(searchKey) {
        console.log(searchKey);




        $('.resultContainer').html('');
        var searchedItem;
        var count = 0;
        var recipe;
        $.ajax({
            type: 'GET',
            async: false,


            url: 'https://api.edamam.com/search?' +
            'q='+searchKey+'&app_id=3e043da3&app_key=\n' +
            '91bbacb3992f0099181b6a1385ebab3f\t\n&from=0&to=20&calories=gte%20591,%20lte%20722&health=alcohol-free',

            /*
            url: 'https://api.edamam.com/api/food-database/parser?ingr='+searchKey+'&app_id=3e043da3&app_key=\n' +
            '91bbacb3992f0099181b6a1385ebab3f\t\n&page=0',

              */



            success: function (d) {

                searchedItem = d.hits;
            }
        });


        searchedItem.map(function (item) {
            recipe = item.recipe;
            console.log(recipe);

            var recipeNew = recipe.label;
            //console.log(recipeNew);

            /*
            $('.resultContainer').append(
                '<div col-md-8>'+
                '<a href="'+recipe.label+'"'+
                '<div class="itemBar">'+
                '<h3>'+recipe.label+'</h3>'+
                '<h6>Calories: '+recipe.calories+'</h6>'
                +'</div>'+'</a'+'<br>'
            );
            */


            var urlForEach = recipe.label;
            var urlForEachTemp;
            //var urlForEach = recipe.label;

            //urlForEachTemp = urlForEach.replace(' ','_');
            urlForEachTemp = urlForEach.replace(/ /g, '_');

            console.log(recipe.label);
            console.log(searchKey);


            //return s.indexOf(' ') >= 0;

            //new String("a").valueOf() == new String("a").valueOf()
            reciName = recipe.label;

            if(reciName.valueOf() == searchKey.valueOf() && count ==0) {

                count = 1;
                $('.resultContainer').append(
                    '<div class="list-group col-md-8 col-md-offset-2" xmlns="http://www.w3.org/1999/html">'+
                    '<a href="recipe/'+urlForEachTemp+'" class="list-group-item active">'+
                    '<div class="itemBar">'+
                    '<h3>'+recipe.label+'</h3>'+
                    '</div>'+
                    '</a>'+'<br>'+


                    '<div class="row col-md-12">'+

                        '<div class="col-md-7">'
                            +'<ul><h3 class="text-success">Health Label: '+
                            recipe.healthLabels[0]
                            +'</ul></h3>'
                            +'<ul><strong>'+recipe.totalNutrients.CA.label+':  '+
                            recipe.totalNutrients.CA.quantity+' '+recipe.totalNutrients.CA.unit
                            +'</ul></strong>'+

                            '<ul class="text-danger"><strong> Calories: '+
                            recipe.calories
                            +'</strong></ul>'+
                        '</div>'+

                        '<div class="col-md-offset-2 col-md-3">'+
                            '<div class="img-wrapper">'+
                            '<img src="'+recipe.image+'" alt="Dish">'
                            +'</div>'
                        +'</div>'+

                    '</div>'+












                    '</div>'
                );


                $('.Ingredients').append(
                    'Ingredients:' );

                $('.addIcon').append(
                '<i class="col-md-offset-2 fa fa-plus-square fa-5x" aria-hidden="true">'+'</i>'+
                    '<h4 class="text-success">'+'Add to Favourites'+'</h4>'
                 );



                var i;
                for(i = 0;i<recipe.ingredientLines.length; i++){
                    $('.ingredientLines').append(
                        '<h4 class="text-success">'+(i+1)+'. '+recipe.ingredientLines[i]+'</h4>'
                    );
                }
            }




        });


        var temp = recipe.digest;
        var tempZero = temp[1].daily;
        //var tempOne = tempZero[0];



        var myJSON = JSON.stringify(recipe.label);


        //TODO NEWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW


    }


    function func() {

        var formValue = document.getElementById("demo").innerHTML = formValue;

        getSearchKey(formValue);

    }

    function loading(){
        var buttonClicked = document.getElementById('buttonClicked');
        buttonClicked.style.display = "none";

        //buttonClicked.innerHTML = 'Progrsesing...';
    }

    function searchValue() {
        var formValue = document.getElementById('nameNew').value;

        //var formValue = "Circassian Chicken";
        //console.log(formValue);
        getSearchKey(formValue);
    }

    $('#searchForm').submit(function (e) {
        e.preventDefault();

        //searchValue();
    })





</script>


</body>
</html>



