<?php
session_start();

require_once("User.php");
require_once("BerichtenLijst.php");
require_once("UserLijst.php");

if (!isset($_SESSION["gebruiker"])) {
    header("Location: publicpage.php");
    exit;   
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["User"]);

$bl = new BerichtenLijst();
$ul = new UserLijst();

if (isset($_GET["action"]) && $_GET["action"] === "new") {
    $bl->addBericht((int) $gebruiker->getId(), (string) $_POST["boodschap"]);
}

?>
<?php
require_once("header.php");
?>
<section><h2>Welkom <?php echo $gebruiker->getNaam(); ?></h2></section>
<section>
    <h2>Berichten</h2>
    <br>
    <table>
        <thead>
            <th>Gebruiker</th>
            <th>Tijdstip</th>
            <th>Boodschap</th>
        </thead>
        <tbody>
        <?php
        $tab = $bl->getLijst();
        foreach ($tab as $bericht) {
            $user = $ul->getNaamById((int) $bericht->getUserId());
            ?>
            <tr>
                <td><?php echo $user . ">"; ?></td>
                <td><?php echo $bericht->getTijdstip(); ?></td>
                <td><?php echo $bericht->getBoodschap(); ?></td>

            </tr>
             <?php
        }
        ?>
    <table>
</section>
<section class="bericht-toevoegen">
        <h2>Bericht Toevoegen</h2>
        <br>
        <form action="gastenboek.php?action=new" method="POST">
            <div>
                <label for="boodschap">Boodschap:</label>
                <br>
                <textarea name="boodschap" id="boodschap" cols="30" rows="5" maxlength="200"></textarea>
            </div>
            <input type="submit" value="Opslaan">
        </form>
    </section>
<?php
require_once("footer.php");
?>