<?php

namespace Core\Tools;

use Core\Tools;

?>
<h1>
    <?php echo TITRE_CATEGORIES_INDEX ?>
</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allCategories as $allCategory): ?>
            <tr>
                <td>
                    <?php echo $allCategory['id'] ?>
                </td>
                <td>
                    <?php echo $allCategory['name'] ?>
                </td>
                <td>
                    <?php echo $allCategory['description'] ?>
                </td>
                <td>
                    <button type="button" class="add"> Ajouter </button>
                    <button type="button" class="edit"> Modifier </button>
                    <button type="button" class="delete"> Supprimer </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>