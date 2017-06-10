<!--Ce que qu'on veut faire c'est lister les article fichier etc..-->
<?php
    // On recupere
    $tableau = scandir("utilisateur", SCANDIR_SORT_NONE); //Affiche le text par ordre.
    // On veut filtrer nos fichier les information pour mieux les utiliser 
    // et recupere que nos fichier dans un tableau appeler post.
    // $post = array_filter($array, is_file) est egal a la boucle foreach.
    $post = [];
    foreach($tableau as $file) {
        if(is_dir($file)) {
            continue; //Si j'ai un dossier continue.
        }
        //si c'est fichier continue'
        if($file == ".") {
            continue;
        }
        if($file == "..") {
            continue;
        }
        //si c'est pas un fichier ajoute le a $post.
        //Et si ce n'est pas un dossier met moi les fichier dans le post qui est un tableau.
        $post[] = $file; 
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index blogs</title>
</head>
<body>
    <h1>Index des blogs</h1>
    <nav><a href="create.html">Ajouter un fichier</a></nav>
    <p>tout sur l'ajout....</p>

    <!--Afficher le contenus d'une variable soit les fichier du tableau.-->
    <p>
        <?php var_dump($tableau)?>
    </p>
    <p>
        <?php var_dump($post)?>
    </p>
    
      <!--print_r(affiche le contenus de la variable.) c'est pareil que var_dump()-->
    <!--On  fait une boucle php-->
    <!--La boucle foreach fera le tour sur le nombre de fichier que j'ai.-->
    <!--Dans la boucle foreach on le remplace par post -->
    <?php foreach($post as $file) {
        // recupere contenus des fichier dans le dossier utilisateur.
        //Afficher le contenus d'un fichier, ajouter le chemin et le fichier.'
    $content = file_get_contents('utilisateur/' . $file); ?> 
        <article>
            <h2><?php echo $file; ?></h2>
            <p><?php echo $content; ?></p>
        </article>

    <!--On crée un button pour supprimer -->
    <form action="delete.php" method="POST">
        <input type="hidden" name="filename" value="<?php echo $file; ?>">
        <input type="submit" value="delete">
    </form>
    <?php } ?>


</body>
</html>