<!--Pour supprimer mes fichier-->

<?php
    // supprimer les fichier
    $filename = $_POST["filename"];
    echo "<p>" . $filename . "</p>";
    // Maintenant suppriemr le fichier.
    unlink('post/' . $filename);
    echo "<p>" .$filename . " le fichier a été supprimer" . "<p>";
    // header("location: index.php");s
?>