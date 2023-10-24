<?php

namespace Core\Tools;

use Core\Tools;

?>
<!-- <h2 class="text-2xl font-bold mb-4"> Les 9 derniers chefs </h2> -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <!-- User Card -->
    <?php foreach ($allUsers as $user): ?>
        <article class="bg-white rounded-lg overflow-hidden shadow-lg relative">

            <!-- User Image -->
            <img class="w-full h-48 object-cover" src="../document/pictures/<?php echo $user['user_picture']; ?>"
                alt="User Image" />

            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">
                    <?php echo $user['user_name'] ?>
                </h3>

                <!-- Inscription Date -->
                <div class="text-gray-600 mb-1">
                    Inscrit depuis le
                    <?php echo date("d-m-Y", strtotime($user['registration_date'])); ?>
                </div>

                <!-- Number of Recipes -->
                <div class="text-gray-500 mb-2">
                    <i class="fas fa-utensils"></i>
                    <?php echo $user['recipe_count'] ?> recettes
                </div>

                <a href="users/<?php echo $user['user_id']; ?>/<?php echo slugify($user['user_name']); ?>"
                    class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-800 rounded-full px-4 py-2 text-white">
                    Voir mes recettes
                </a>

            </div>
        </article>
    <?php endforeach; ?>
</div>