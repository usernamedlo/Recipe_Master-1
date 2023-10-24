<!-- User Info -->

<div class="flex items-center mb-6">

  <!-- User Avatar -->

  <img src="../document/pictures/<?php echo $topUser['user_picture']; ?>" alt="<?php echo $topUser['user_name']; ?>"
    class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

  <!-- User Details -->

  <div>
    <h3 class="text-2xl font-bold">
      <?php echo $topUser['user_name'] ?>
    </h3>
    <p class="text-gray-400">Membre depuis le
      <?= $topUser['formatted_user_subscription'] ?>
    </p>
    <p class="text-gray-400">Nombre de recettes postées:
      <?php echo $topUser['total_recipes_posted'] ?>
    </p>
  </div>
</div>

<!-- User Actions -->

<div class="flex justify-between items-center mb-4">

  <a href="users/<?php echo $topUser['user_id']; ?>/<?php echo Core\Tools\slugify($topUser['user_name']); ?>"
    class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">

    Voir mes recettes

  </a>

</div>

<!-- User's Latest Recipes -->

<div>

  <h4 class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">

    Mes dernières recettes

  </h4>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">