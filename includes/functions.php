<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('notEmpty')) {
    function notEmpty($obj)
    {
        foreach ($obj as $key => $value) {
            if (empty($value) || trim($value) == "") {
                return false;
            }
        }
        return true;
    }
}

if (!function_exists('saveInputData')) {
    function saveInputData()
    {
        foreach ($_POST as $key => $value) {
            if ($key != "password" && $key != 'passwordConfirm') {
                $_SESSION['input'][$key] = $value;
            }
        }
    }
}

/*
* Cette fonction permet de supprimer les données des champs de saisi
* sauvegarder dans la session 
*/
if (!function_exists('clearInputData')) {
    function clearInputData()
    {
        $_SESSION['input'] = [];
    }
}

/*
 * cette foonction permet de rechercher la valeur d'un champ de saisie dans
 * la session et de la retournée. Dans le cas où aucune valeur n'a été trouvée,
 * elle renvoie une chaine de caractère vide.
*/
if (!function_exists('getInputData')) {
    function getInputData($field)
    {
        if (!isset($_SESSION['input'])) {
            return "";
        }
        foreach ($_SESSION['input'] as $key => $value) {
            if ($key == $field) {
                return $value;
            }
        }
        return "";
    }
}

if (!function_exists('isAlreadyInUse')) {
    function isAlreadyInUse($field, $value)
    {
        global $db;

        $stmt = $db->prepare("select * from users where $field=:value or email=:value");
        $stmt->execute(['value' => $field]);

        return $stmt->rowCount();
    }
}

if (!function_exists('setFlash')) {
    function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'text' => $message,
            'type' => $type
        ];
    }
}

function getFlash()
{
    if (!isset($_SESSION['flash'])) {
        return "";
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    $class = $flash['type'] == 'error' ? 'danger' : $flash['type'];
    $html = '<div class="alert alert-' . $class . '">';
    if (is_array($flash['text'])) {
        $html .= "<ul>";
        foreach ($flash['text'] as $text) {
            $html .= '<li>' . $text . '</li>';
        }
        $html .= "</ul>";
    } else {
        $html .= $flash['text'];
    }
    $html .= "</div>";
    return $html;
}

/**
 * Cette fonction de permet de hacher (rendre incomprehensible) une chaine de caractère en utilisant
 * l'algorithme de hachage CRYPT_BLOWFISH. On l'utilise généralement pour hacher le mot de passe des
 * utilisateur avant de le sauvegarder dans une base de donnée au moment de leur inscription.
 * Elle prend deux paramètres dont le 2ème est facultatif :
 * @var $value : correspond au text clair que l'on souhaite hacher
 * @var $round: correspond au nombre de tour de hach que l'on souhaite utiliser pour plus de sécurité
 * @return : la fonction renvoie une chaine de caractère correspondant au text hacher
 */
function bcriptPasswordHash($value, $rounds = 10)
{

    $hash = password_hash($value, PASSWORD_BCRYPT, array('cost' => $rounds));

    if ($hash === false) {

        throw new \Exception("Bcript hashing n'est pas supporté.");
    }

    return $hash;
}


/**
 * Cette fonction permet de comparer le text clair à la chaine de caractère hacher en utilisant
 * l'algorithme de hachage CRYPT_BLOWFISH. On l'utilise généralement au moment de l'authentification d'un
 * utilisateur pour nous assurer qu'il à fourni le mot de passe avant de l'authentifier.
 * Elle prend deux paramètres obligatoire qui sont :
 * @var $value : Correspond au text en clair (fourni par l'utlisateur à travers un champ input)
 * @var $hashedValue : Correspond à la chaine hacher (Provenant généralement d'une base de données)
 * @return : la fonction retourne 'true' si la chaine en clair ($value) correspond exactement à la chaine
 * hacher ($hashedValue) ou 'false" dans le cas échean.
 */

function bcriptVerifyPassword($value, $hashedValue)
{
    return  password_verify($value, $hashedValue);
}


function setUser($user)
{
    $_SESSION['user'] = $user;
}

if (!function_exists("getUser")) {
    function getUser($user_id = null)
    {
        global $db;
        if ($user_id) {
            $stmt = $db->prepare('select * from users where id=?');
            $stmt->execute([$user_id]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        }
        return isset($_SESSION['user']) ? (object) $_SESSION['user'] : null;
    }
}

function logout()
{
    unset($_SESSION['user']);
    return true;
}

function isLogged()
{
    return getUser() ? true : false;
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("location: $path.php");
        exit();
    }
}

if (!function_exists('getMessage')) {
    function getMessage($subject_id, $sender_id, $limit = 10, $offset = null)
    {
        global $db;
        $sql = "select * from messages where (subject_id = $subject_id and sender_id= $sender_id) or (sender_id = $subject_id and subject_id = $sender_id)";
        if ($offset) {
            $sql .= "offset $offset ";
        }
        $sql .= "limit $limit";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
if (!function_exists('currentHostname')) {
    function currentHostname()
    {
        return 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];
    }
}
if (!function_exists('currentUrl')) {
    function currentUrl()
    {
        return currentHostname(). parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

