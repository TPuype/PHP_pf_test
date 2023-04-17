<?php
session_start();
unset($_SESSION["gebruiker"]);
require_once("header.php");
?>
<section>
    <h1>Logout</h1>
    <h2>U bent uitgelogd</h2>
    <br>
    <a href="index.php">Home</a>
</section>
<?php
require_once("footer.php");
?>