<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Process infos</title>
</head>
<body>
    <h1>Recuperation et traitement du formulaire</h1>
    <?php
    $title = $_POST["title"];
    $content = $_POST["content"];
    echo "<p>" . "Je recupere le nom du fichier: " . $title . "</P>";
    echo "<p>" . "Je recupere le contenus du fichier: " . $content . "</P>";

    //Pour organiser on va mettre le tout dans un dosier et vérifier si le dossier existe ou pas.
    if(!is_dir("utilisateur")) {
        mkdir("utilisateur");
    }
    //si on a une erreur que le dossier existe deja c'est normal.
    //Il faut maintenant deplacer les fichier dans le dossier.
    //donc pour sa il faut mettre le chemain dans fopen($1 . £2 . $3) le 1 represente le dossier parent.
    //le 2 represente le dossier enfant du parent 1 et le 3 enfant du parent 2 etc... 


    // on vient de recuperer l'information et on souhaie la stocker dans un fichier.
    $file = fopen("utilisateur/" . $title . ".txt", "w"); //Le "w" ecrase et ecris le nouveau contenus s'il existe deja.
    fwrite($file, $content);
    fclose($file);
    // il faut mettre les droit de l'ecriture par le biais du terminal avec la commande
    // chmod O+w ou a+drw et sans oubnlier le "." pour dire que c'est le dossier courant.
    //On félicite l'utilisateur.
    echo "Félicitation: " . "Super, tu as crée et poster un fichier avec son contenus propre !";
    //retourne la page sur index.php
    header("location: index.php");
    ?>
</body>
</html>