<?php 
require_once "includes/functions.php";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Forum de discussion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <?php if(!isLogged()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Connexion</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="messenger.php">Messenger</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Deconnexion</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
<?php echo getFlash() ?>