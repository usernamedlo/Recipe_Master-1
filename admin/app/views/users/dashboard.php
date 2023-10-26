<div class="jumbotron">
    <h1>Bienvenue
        <?php
        if (isset($_SESSION['user']) && isset($_SESSION['user']['name'])) {
            echo $_SESSION['user']['name'];
        } else {
            echo "Guest";
        }
        ?>
    </h1>
    <p>
        This is a admin template showcasing the optional theme stylesheet included
        in Bootstrap. Use it as a starting point to create something more
        unique by building on or modifying it.
    </p>
</div>