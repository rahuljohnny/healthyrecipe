



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getSearchKey(searchKey) {
    $('.resultContainer').html('');
    $('.classHeader').html('');
    var searchedItem;
    var recipe;
    var searchButton = document.getElementById("searchButton");




    $.ajax({
        type: 'GET',

        async: false,
        url: 'https://api.edamam.com/search?' +
        'q='+searchKey+'&app_id=3e86fe81&app_key=\n' +
        '4be5bb16bc66e8a68250e4fa63e17458&from=0&to=7&calories=gte%20591,%20lte%20722&health=alcohol-free',


        success: function (d) {
            searchedItem = d.hits;
        },

        complete: function () {
            searchButton.innerHTML = "Search Again..."
        }
    });

    searchedItem.map(function (item) {
        recipe = item.recipe;
        var recipeNew = recipe.label;
        var uniqueness = recipe.uri;

        var indexOfHash = uniqueness.indexOf("_");

        //var urlForEach = recipe.uri;


        var urlForEachTemp = uniqueness.substring(indexOfHash+1, uniqueness.length);
        //var urlForEachTemp = urlForEach;


        console.log(urlForEachTemp);

        //#####################################################################################

        //#####################################################################################

        $('.resultContainer').append(


        '<div class="list-group col-md-8 col-md-offset-2">'+



        '<a href="recipe/'+urlForEachTemp+'" class="list-group-item active">'+
                    '<div class="itemBar">'+
                        '<h3>'+recipe.label+'</h3>'+
                    '</div>'+
                '</a>'+'<br>'+


                '<div class="row">'+
                    '<div class="col-lg-8 col-md-8 col-sm-8">'
                        +'<ul> Diet Labels: '+
                        recipe.dietLabels[0]
                        +'</ul>'
                        +'<ul> Health Label: '+
                        recipe.healthLabels[0]
                        +'</ul>'+

                        '<ul> Calories: '+
                        recipe.calories
                        +'</ul>'+
                    '</div>'+

                    '<div class="col-lg-2 col-md-2 col-sm-2 pull-right">'+
                        '<div class="img-wrapper">'+
                            '<img src="'+recipe.image+'" alt="Dish">'
                        +'</div>'
                    +'</div>'+
                '</div>'+
            '</div>'
        );
    });
}



function searchValue() {
    var formValue = document.getElementById('searchBar').value;
    //console.log(formValue);
    $('.classHeader').append("Search Results");
    getSearchKey(formValue);
}

$('#searchForm').submit(function (e) { //TODO: To prevent a "form submission refresh" its used
    e.preventDefault();

})

$('#message').fadeIn(3000);

//$("#div3").fadeIn(3000);




