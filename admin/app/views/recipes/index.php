<?php

namespace Core\Tools;

use Core\Tools;

?>
<h1>
  <?php echo TITRE_RECIPES_INDEX ?>
</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Preparation Time</th>
      <th>Description</th>
      <th>User</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allRecipes as $allRecipe): ?>
      <tr>
        <td>
          <?php echo $allRecipe['dish_id'] ?>
        </td>
        <td>
          <?php echo $allRecipe['dish_name'] ?>
        </td>
        <td>
          <?php echo $allRecipe['dish_prep_time'] ?>
        </td>
        <td>
          <?php echo $allRecipe['description'] ?>
        </td>
        <td>
          <?php echo $allRecipe['user_name'] ?>
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