<?php

?>
<div class="page-header">
    <h1>
        Ajout d'un utilisateur
    </h1>
</div>
<div>
    <a href="<?php echo ADMIN_ROOT; ?>/users">Retour à la liste des utilisateurs</a> <br><br>
</div>
<form action="users/add/insert" method="post">
    <fieldset>
        <legend>Données de l'utilisateur</legend>
        <div>
            <label for="test">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" />
            <br><br>
            <label for="test">email</label>
            <input type="text" id="email" name="email" placeholder="Email" />
            <br><br>
            <label for="test">Password</label>
            <input type="text" id="password" name="password" placeholder="Password" />
            <br><br>
            <label for="test">Biography</label>
            <input type="number" id="biography" name="biography" placeholder="Biography" />
            <br><br>
            <!-- <label for="test">Image</label>
            <input type="image" id="image" name="image" placeholder="Image" /> -->
        </div><br>
    </fieldset>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>