// function
function appendIngredientOption (index) {
    $.each(ingredientCategoriesObject, function(i, value){
        $('#ingredientItem_' + index + ' select').append($('<option>').html(value.ingredient_category_name).val(value.id));
    });
}

function removeIngredientOption (index) {
    $('#ingredientItem_' + index).remove();
}


let index = $('#Ingredient-List li:last').find('button').data('index');
if (typeof(index) === 'undefined') {
    index = 0;
} else {
    ++index;
}

// イベント
$('.Input-Plus').click(function () {
    var ingredientItem = `
<li id="ingredientItem_${index}"  class="ingredientItem">
    <select name="ingredient_category[]" class="editIngredient editIngredientCategory">
        <option value=''>カテゴリー</option>
    </select>
    <span>
        <input name="ingredient_name[]" placeholder="材料名" class="editIngredient editIngredientName" required>
        <input name="ingredient_amount[]" placeholder="量" class="editIngredient editIngredientAmount">
    </span>
<button type="button" class="Input-Minus" data-add-index="${index}">✖︎</button>
</li>
`;
    $('#Ingredient-List').append(ingredientItem);
    appendIngredientOption(index);
    ++index;
})

$(document).on('click', '.Input-Minus', function () {
    let index = '';
    if (typeof($(this).data('index')) === 'undefined') {
        index = $(this).data('add-index');
    } else if (typeof($(this).data('add-index')) === 'undefined') {
        index = $(this).data('index');
    };
    removeIngredientOption(index);
})
