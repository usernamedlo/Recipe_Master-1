<?php

namespace Core\Tools;

use Core\Tools;

?>
<h1>
    <?php echo TITRE_INGREDIENTS_INDEX ?>
</h1>
<a type="button" class="add"> Ajouter un ingrédient </a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Unit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allIngredients as $allIngredient): ?>
            <tr>
                <td>
                    <?php echo $allIngredient['id'] ?>
                </td>
                <td>
                    <?php echo $allIngredient['name'] ?>
                </td>
                <td>
                    <?php echo $allIngredient['unit'] ?>
                </td>
                <td>
                    <button type="button" class="edit"> Modifier </button>
                    <button type="button" class="delete"> Supprimer </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>