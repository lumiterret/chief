import './bootstrap';
import 'bootstrap';
import $ from 'jquery';

window.jQuery = window.$ = $;

import.meta.glob([
    '../img/**'
]);


$(document).ready(function () {
    console.log('ready')
    var i = 0;
    $('.input-group > button.add-collection-widget').on('click',function (){
        ++i;
        var inputGroup =
            '<div class="row input-group mb-3">' +
            '<div class="col-sm-5 mx-0">'+
                '<input type="text" id="recipe_ingredients_0_name" name="recipe[ingredients]['+ i +
                '][name]" class="form-control-sm form-control" placeholder="Название ингредиента" value="">' +
            '</div>'+
            '<div class="col-sm-5 mx-0">'+
                '<input type="text" id="recipe_ingredients_0_note" name="recipe[ingredients]['+ i +
                '][note]" placeholder="Заметка" class="form-control-sm form-control" value="">' +
            '</div>'+
            '<div class="col-2">'+
                '<button type="button" class="btn btn-danger btn-sm delete-collection-widget ">'+
                    '<i class="fas fa-minus-circle"></i>&nbsp;'+
                '</button>'+
            '</div>'+
        '</div>';
        $('.form-recipe-ingredients').append(inputGroup);
    });

    $(document).on('click', '.delete-collection-widget', function(){
        $(this).parent('div').parent('div').remove();
    });
});
