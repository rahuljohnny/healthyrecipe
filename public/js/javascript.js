$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getSearchKey(searchKey) {
    $('.resultContainer').html('');
    var searchedItem;
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
            //console.log(d);

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

        console.log(urlForEachTemp);


        //return s.indexOf(' ') >= 0;

        $('.resultContainer').append(


        '<div class="list-group col-md-10">'+
            '<h3>'+"Search Results-"+'</h3>'+


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
    getSearchKey(formValue);
}

$('#searchForm').submit(function (e) { //TODO: To prevent a "form submission refresh" its used
    e.preventDefault();
})
