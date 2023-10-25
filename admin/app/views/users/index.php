<?php

namespace Core\Tools;

use Core\Tools;

?>
<h1>
  <?php echo TITRE_USERS_INDEX ?>
  <div>
    <a type="button" class="add"> Ajouter un utilisateur </a>
  </div>

</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>biography</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allUsers as $allUser): ?>
      <tr>
        <td>
          <?php echo $allUser['user_id'] ?>
        </td>
        <td>
          <?php echo $allUser['user_name'] ?>
        </td>
        <td>
          <?php echo $allUser['email'] ?>
        </td>
        <td>
          <?php echo $allUser['pwd'] ?>
        </td>
        <td>
          <?php echo $allUser['bio'] ?>
        </td>
        <td>
          <button type="button" class="edit"> Modifier </button>
          <button type="button" class="delete"> Supprimer </button>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>