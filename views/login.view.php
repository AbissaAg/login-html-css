<?php echo $header ?>
        
    <div class="row">
        <div class="col-8">
        </div>
        <div class="col-4">
            <div class="bg-light mt-2 p-3">
                <div class="text-center">
                    <i class="fa fa-user fa-4x"></i>
                    <h2>
                        Se Connecter
                    </h2>
                </div>
                <form action="login.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="name">Identifiant :</label>
                        <input type="text" name="username" autocomplete="false" value="<?= getInputData("username") ?>" placeholder="Identifiant" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Mot de passe :</label>
                        <input type="password" name="password" autocomplete="new-password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <div class="text-center mt-2">
                        <input type="submit" value="Connexion" name="login" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
require 'partials/footer.php';