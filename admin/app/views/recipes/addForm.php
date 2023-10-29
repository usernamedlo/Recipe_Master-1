<div class="page-header mt-3">
    <h1>Ajout d'une recette</h1>
</div>
<div class="mb-3">
    <a href="<?php echo ADMIN_ROOT; ?>/recipes" class="btn btn-secondary">Retour à la liste des recettes</a>
</div>
<div class="card bg-gray mb-3">
    <div class="card-body">
        <form action="<?php echo ADMIN_ROOT; ?>/recipes/add/insert" method="post" class="form-horizontal">
            <fieldset>
            <legend>Données de la recette</legend>

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description"
            placeholder="Description" />
    </div>
</div>

<div class="form-group row">
    <label for="prep_time" class="col-sm-2 col-form-label">Preparation time</label>
    <div class="col-sm-10">
        <input type="time" class="form-control" id="prep_time" name="prep_time" />
    </div>
</div><!-- ... Autres champs restent inchangés ... -->
                
                <div class="form-group row">
                    <label for="user_id" class="col-sm-2 col-form-label">Chef</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="user_id" id="user_id">
                            <?php foreach ($allUsers as $user): ?>
                                <option value="<?php echo $user['user_id']; ?>">
                                    <?php echo $user['user_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type_id" class="col-sm-2 col-form-label">Categories</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="type_id" id="type_id">
                            <?php foreach ($allCategories as $category): ?>
                                <option value="<?php echo $category['category_id']; ?>">
                                    <?php echo $category['category_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <fieldset>
                    <legend>Ingrédients</legend>
                    <?php include_once '../app/models/ingredientsModel.php'; ?>
                    <?php foreach ($allIngredients as $ingredient): ?>
                        <div class="form-group row align-items-center">
                            <div class="col-md-1">
                                <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['ingr_id']; ?>"
                                    id="ingredient-<?php echo $ingredient['ingr_id']; ?>">
                            </div>
                            <label for="ingredient-<?php echo $ingredient['ingr_id']; ?>" class="col-md-3 col-form-label">
                                <?php echo $ingredient['ingr_name']; ?>
                            </label>
                            <label for="quantity-<?php echo $ingredient['ingr_id']; ?>" class="col-md-2 col-form-label">
                                Quantité :
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="quantity-<?php echo $ingredient['ingr_id']; ?>"
                                    id="quantity-<?php echo $ingredient['ingr_id']; ?>">
                                    <?php for ($i = 0.5; $i <= 10; $i += 0.5): ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $i . " " . $ingredient['ingr_unit']; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-lg btn-primary" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
