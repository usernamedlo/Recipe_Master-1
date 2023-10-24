<!-- User Main Content -->

<!-- Main content -->

<div class=" p-3">

  <!-- Hero User Profile -->

  <section class="relative mb-6">
    <img class="w-full h-96 object-cover" src="../document/pictures/<?php echo $user['user_picture']; ?>"
      alt="<?php echo $user['user_name']; ?>" />

    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">

      <h1 class="text-3xl font-bold mb-2 text-white">
        <?php echo $user['user_name']; ?>
      </h1>
      <p class="text-gray-300 mb-4">
        <?php echo $user['user_biography']; ?>
      </p>
    </div>
  </section>

  <!-- User's Recipes -->

  <section>

    <h2 class="text-2xl text-white font-bold mb-4">Mes recettes</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

      <!-- Recipe Card -->

      <?php foreach ($recipesByUser as $recipeByUser): ?>

        <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">

          <img class="w-full h-48 object-cover" src="<?php echo $recipeByUser['dish_picture'] ?>" alt="Recipe Image" />

          <div class="p-4">

            <h3 class="text-xl font-bold mb-2 text-black">
              <?php echo $recipeByUser['dish_name'] ?>
            </h3>

            <div class="flex items-center mb-2">
              <span class="text-yellow-500 mr-1">
                <i class="fas fa-star">
                  <?php echo $recipeByUser['avg_rating'] ?>
                </i>
              </span>
            </div>

            <p class="text-gray-600">
              <?php echo isset($recipeByUser['short_description']) ? $recipeByUser['short_description'] : ''; ?>
            </p>


            <div class="flex items-center mt-4">
            </div>
            <a href="recipes/<?php echo $recipeByUser['id']; ?>/<?php echo
                 Core\Tools\slugify($recipeByUser['dish_name']); ?>"
              class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">

              Voir la recette

            </a>
          </div>
        </article>
      <?php endforeach; ?>

    </div>
  </section>