import './bootstrap';
import 'bootstrap';
import '../css/app.scss'
import $ from 'jquery';

window.jQuery = window.$ = $;

import.meta.glob([
    '../img/**'
]);


$(document).ready(function () {
    console.log('ready')
    var ingredientCount = $('.ingredient-input').length;

    function appendIngredientInput(name='', notes='') {
        var ingredientDiv = $('<div class="ingredient-input input-group mb-2"></div>');

        var nameInput = $('<input type="text" name="ingredients[' + ingredientCount + '][name]" class="form-control mt-1" placeholder="Наименование" value="' + name + '" required>');
        var notesInput = $('<input type="text" name="ingredients[' + ingredientCount + '][notes]" class="form-control mt-1" placeholder="Заметки" value="' + notes + '">');
        var removeButton = $('<button type="button" class="btn btn-danger mt-1"><i class="fa-solid fa-trash-can"></i>&nbsp;Remove</button>');

        ingredientDiv.append(nameInput, notesInput, removeButton);
        $('#ingredients').append(ingredientDiv);

        ingredientCount++;
    }

    $('#addIngredientButton').click(function() {
        appendIngredientInput();
    });

    $(document).on('click', '.btn.btn-danger.mt-1', function() {
        $(this).closest('.ingredient-input').remove();
    });

});
