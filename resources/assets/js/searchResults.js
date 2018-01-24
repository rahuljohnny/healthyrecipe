
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

            count = 1;

            $('.resultContainer').append(

                '<div class="list-group col-md-8 col-md-offset-2" xmlns="http://www.w3.org/1999/html">' +
                '<a href="recipe/' + urlForEachTemp + '" class="list-group-item active">' +
                '<div class="itemBar">' +
                '<h3>' + recipe.label + '</h3>' +
                '</div>' +
                '</a>' + '<br>' +


                '<div class="row col-md-12">' +
                '<div class="col-md-7">'
                + '<ul><h3 class="text-success">Health Label: ' +
                recipe.healthLabels[0]
                + '</ul></h3>'
                + '<ul><strong>' + recipe.totalNutrients.CA.label + ':  ' +
                recipe.totalNutrients.CA.quantity + ' ' + recipe.totalNutrients.CA.unit
                + '</ul></strong>' +

                '<ul class="text-danger"><strong> Calories: ' +
                recipe.calories
                + '</strong></ul>' +
                '</div>' +

                '<div class="col-md-offset-2 col-md-3">' +
                '<div class="img-wrapper">' +
                '<img src="' + recipe.image + '" alt="Dish">'
                + '</div>'
                + '</div>' +
                '</div>' +
                '</div>'
            );


            $('.Ingredients').append(
                'Ingredients:');

            $('.addIcon').append('' +
                '<div class="faPlus">'+
                '<i class="fa fa-plus-square fa-5x col-md-offset-2 " aria-hidden="true" style="color: #2b542c">' + '</i>' +
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
    $('.addIcon').hide();


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
                );
            }
            else if(data == '1'){
                $('.dialogmsg').append(
                    '<strong><h3>'+'Added to favourits!!'+'</h3></strong>'
                );
            }
        }
    });
}