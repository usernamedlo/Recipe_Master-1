<aside class="w-full md:w-1/4 p-3">

    <!-- Catégories -->

    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">

        <h2 class="font-bold text-lg mb-4">
            Catégories
        </h2>

        <ul class="list-reset text-gray-100">

            <?php
            include '../app/models/categoriesModel.php';
            $categories = \App\Models\CategoriesModel\getAllCategories($connexion);
            foreach ($categories as $categorie):
                ?>
                <li>
                    <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="#">
                        <?php echo $categorie['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Ingrédients -->

    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <h2 class="font-bold text-lg mb-4">Ingrédients</h2>
        <ul class="list-reset text-gray-200">
            <?php
            include '../app/models/ingredientsModel.php';
            $ingredients = \App\Models\getAllIngredientsModel\getAllIngredients($connexion);
            foreach ($ingredients as $ingredient):
                ?>
                <li>
                    <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="#">
                        <?php echo $ingredient['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>