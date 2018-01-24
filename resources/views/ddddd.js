
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
