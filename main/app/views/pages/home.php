<!-- zone dynamique de la page d'accueil -->

<!-- Hero Recipe Card -->

<?php include_once '../app/views/recipes/_recipeRandom.php'; ?>

<section>
  <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
  <?php include_once '../app/views/recipes/_recipeByRating.php'; ?>
</section>

<!-- User Profile Section -->
<h2 class="text-2xl font-bold mb-4" style="padding-top: 15px">

  Chef.fe populaire

</h2>

<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">

  <?php include_once '../app/views/users/_userTop.php'; ?>

  <!-- User's Latest Recipes -->

  <?php include_once '../app/views/recipes/_recipesLastsByUser.php'; ?>

</section>