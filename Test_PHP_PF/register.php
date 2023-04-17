<?php
require_once("User.php");
require_once("exceptions.php");

$error = "";
if (isset($_POST["btnRegistreer"])) {
    $naam;
    $email = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";

    if (!empty($_POST["txtNaam"])) {
        $naam = $_POST["txtNaam"];
    } else {
        $error .= "Vul een gebruikersnaam in.<br>";
    }

    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (
        !empty($_POST["txtWachtwoord"]) &&
        !empty($_POST["txtWachtwoordHerhaal"])
    ) {
        $wachtwoord = $_POST["txtWachtwoord"];
        $wachtwoordHerhaal = $_POST["txtWachtwoordHerhaal"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.<br>";
    }

    if ($error == "") {
        try {
            $gebruiker = new User();
            $gebruiker->setNaam($naam);
            $gebruiker->setEmail($email);
            $gebruiker->setWachtwoord($wachtwoord, $wachtwoordHerhaal);
            $gebruiker = $gebruiker->register();
            $_SESSION["gebruiker"] = serialize($gebruiker);
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is geen geldig e-mailadres.<br>";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit e-mailadres.<br>";
        }
    }
}
?>

<?php
require_once("header.php");
?>
<?php

if ($error == "" && isset($_SESSION["gebruiker"])) {
    echo "<section>";
    echo "U bent succesvol geregistreerd.";
    echo "</section>";
?> <a href="login.php">Log in</a>
<?php
} else if ($error != "") {
    echo "<section>";
    echo "<span style=\"color:red;\">" . $error . "</span>";
    echo "</section>";
}
if (!isset($_SESSION["gebruiker"])) {
?>
    <section>
        <h1>Registreren</h1>
        <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="txtNaam">Naam:</label>
            <input type="text" name="txtNaam"><br>
            <label for="tctEmail">Email:</label>
            <input type="email" name="txtEmail"><br>
            <label for="txtWachtwoord">Wachtwoord:</label>
            <input type="password" name="txtWachtwoord"><br>
            <label for="txtWachtwoordHerhaal">Wachtwoord herhalen:</label>
            <input type="password" name="txtWachtwoordHerhaal"><br>
            <input type="submit" value="Inloggen" name="btnRegistreer">
        </form>
    </section>
<?php
}
?>
<?php
require_once("footer.php");
?>