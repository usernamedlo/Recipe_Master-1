<?php

// namespace Core\tools;

// use Core\tools;

?>

<!-- Recipe Card -->
<?php foreach ($topUserLastRecipes as $topUserLastRecipe): ?>

  <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">

    <img class="w-full h-48 object-cover" src="<?php echo $topUserLastRecipe['dish_picture'] ?>" alt="Recipe Image" />

    <div class="p-4">

      <h3 class="text-xl font-bold mb-2 text-black">
        <?php echo $topUserLastRecipe['dish_name'] ?>
      </h3>

      <div class="flex items-center mb-2">
        <span class="text-yellow-500 mr-1">
          <i class="fas fa-star">
            <?php echo $topUserLastRecipe['avg_rating'] ?>
          </i>
        </span>
      </div>

      <p class="text-gray-600">
        <?php echo $topUserLastRecipe['short_description'] ?>
      </p>

      <div class="flex items-center mt-4">
      </div>
      <a href="recipes/<?php echo $topUserLastRecipe['id']; ?>/<?php echo Core\Tools\slugify($topUserLastRecipe['dish_name']); ?>"
        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">

        Voir la recette

      </a>
    </div>
  </article>
<?php endforeach; ?>
</div>