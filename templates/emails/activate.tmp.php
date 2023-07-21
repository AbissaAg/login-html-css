<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= " Activation de compte - ".WebSiteName ?></title>
</head>
<body>
    Bonjour,<br>
    Bienvenue sur <?= WebSiteName ?>. 
    Pour activer votre compte, veuillez cliquer sur le lien ci-dessous :<br>
    <a href="http://localhost/socialNetwork/register.php?activate=<?= $token ?>">Activer mon compte</a>
</body>
</html>