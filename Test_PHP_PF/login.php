<?php
session_start();
require_once("User.php");
require_once("UserLijst.php");
require_once("exceptions.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$gebruiker = new user(null, null, null, null);

$error = "";
if (isset($_POST["btnLogin"])) {
    $email = "";
    $wachtwoord = "";
    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtWachtwoord"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
    } else {
        $error .= "Het wachtwoord moet ingevuld worden.<br>";
    }

    $ul = new UserLijst();
    $naam = $ul->getNaamByEmail($email);

    if ($error == "") {
        try {
            $gebruiker = new User(null, $naam, $email, $wachtwoord);
            $gebruiker = $gebruiker->login();
            $_SESSION["gebruiker"] = serialize($gebruiker);
        } catch (WachtwoordIncorrectException $e) {
            $error .= "Het wachtwoord is niet correct.<br>";
        } catch (GebruikerBestaatNietException $e) {
            $error .= "Er bestaat geen gebruiker met dit e-mailadres.<br>";
        }
    }
}

require_once("header.php");
?>
<?php
?>
<?php
if ($error == "" && isset($_SESSION["gebruiker"])) {
    echo "<section>";
    echo "Welkom " . $gebruiker->getNaam();
    echo "<br>";
    echo "U bent succesvol ingelogd.";
    echo "</section>";
?> <a href="gastenboek.php">Bericht plaatsen</a>
<?php
} else if ($error != "") {
    echo "<section>";
    echo "<span style=\"color:red;\">" . $error . "</span>";
    echo "</section>";
}
if (!isset($_SESSION["gebruiker"])) {
?>
    <section>
        <h1>Login</h1>
        <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="txtEmail">Email:</label>
            <input type="email" name="txtEmail"><br>
            <label for="txtWachtwoord">Wachtwoord:</label>
            <input type="password" name="txtWachtwoord"><br>
            <input type="submit" value="Inloggen" name="btnLogin">
        </form>
    </section>
<?php
}
?>
<?php
require_once("footer.php");
?>