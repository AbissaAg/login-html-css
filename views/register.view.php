<?php echo $header; ?>

<div class="row">
    <div class="col-8">
    </div>
    <div class="col-4">
        <div class="bg-light mt-2 p-3">
            <h2 class="text-center">
                Création de compte
            </h2>
            <form action="register.php" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" value="<?= getInputData('name')?>" name="name" placeholder="Nom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lastname">Prenom :</label>
                    <input type="text" value="<?= getInputData('lastname')?>" name="lastname" placeholder="Prenom" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" value="<?= getInputData('username')?>" name="username" placeholder="Adresse email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" value="<?= getInputData('email')?>" name="email" placeholder="Adresse email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sex">Sexe :</label>
                    <select name="sex" id="" class="form-select">
                        <option value="">Veuillez choisir</option>
                        <option value="F">Femme</option>
                        <option value="M">Homme</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthday">Date de naissance :</label>
                    <input type="date" value="<?= getInputData('birthday')?>" name="birthday" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" class="form-control">
                </div>
                <div class="form-group">
                    <label for="passwordConfirm">Confirmer Mot de passe :</label>
                    <input type="password" name="passwordConfirm" placeholder="Confirmer Mot de passe" class="form-control">
                </div>
                <div class="text-center mt-2">
                    <input type="submit" value="Inscription" name="register" class="btn btn-success btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'partials/footer.php';?>
