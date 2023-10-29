<?php include_once '..app/controllers/recipesController.php'; ?>

<div class="page-header">
    <h1>"TITRE_RECIPES_EDITFORM"</h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/recipes">Retour à la liste des recettes</a> <br><br>
</div>
<form action="recipes/<?php echo $recipe['id']; ?>/edit/update" method="post">
    <fieldset>
        <legend>Données de la Recette</legend>
        <div>
            <label for="test">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $dish['dish_name']; ?>" />
            <br><br>
            <label for="test">Description</label>
            <input type="text" id="description" name="description" value="<?php echo $dish['dish_description']; ?>" />
            <br><br>
            <label for="test">Time</label>
            <input type="text" id="time" name="time" value="<?php echo $dish['dish_prep_time']; ?>" />
            <br><br>
            <label for="test">Portions</label>
            <input type="number" id="portion" name="portion" value="<?php echo $dish['portions']; ?>" />
            <br><br>
            <label for="test">Image</label>
            <input type="image" id="image" name="image" value="Image" />
        </div><br>
    </fieldset>

    <div>
        <label for="username">User</label>
        <select name="username" id="username">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['user_id']; ?>" <?php if ($user['user_id'] == $dish['user_id']) {
                       echo 'selected="selected"';
                   } ?>>

                    <?php echo $user['user_name']; ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <div>
        <label for="category_name">Categories</label>
        <select name="category_name" id="category_name">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['category_id']; ?>">

                    <?php echo $category['category_name']; ?>

                </option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <fieldset>
        <legend>Ingedients</legend>
        <div>
            <?php foreach ($ingredients as $ingredient): ?>
                <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['ingr_id']; ?>"
                    id="<?php echo $ingredient['ingredient_name']; ?>" <?php if (in_array($ingredient['ingr_id'], $dishIngredients)) {
                           echo 'checked="checked"';
                       } ?>>
                <label for="<?php echo $ingredient['ingr_name']; ?>">
                    <?php echo $ingredient['ingr_name']; ?>
                </label> <br>



                </option>
            <?php endforeach; ?>
        </div>
    </fieldset>


    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>