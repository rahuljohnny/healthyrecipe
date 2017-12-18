

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


                '<div class="row col-md-8">'+
                '<div class="col-lg-10 col-md-10 col-sm-12">'
                +'<ul><h3> Diet Labels: '+
                recipe.dietLabels[0]
                +'</ul></h3>'
                +'<ul><strong> Health Label: '+
                recipe.healthLabels[0]
                +'</ul></strong>'+

                '<ul class="alert-danger"> Calories: '+
                recipe.calories
                +'</ul>'+
                '</div>'+


                '<div class="col-lg-2 col-md-2 col-sm-12">'+
                '<div class="img-wrapper">'+
                '<img src="'+recipe.image+'" alt="Dish">'
                +'</div>'
                +'</div>'+
                '</div>'+
                '</div>'
            );
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





