<?php
include_once "./db.php";
include_once "./utils.php";



if ($mysql_connect) {

    // Récupérer les catégories
    $categories = getCategories($mysql_connect);

    if ($categories->num_rows > 0) {
        $tab_categories = [];
        while ($row_categories = $categories->fetch_assoc()) {
            $tab_categories[] = $row_categories;
        }
        // echo '<pre>';
        // print_r($tab_categories); 
        // echo '</pre>';
        
    } else {
        echo 'Aucune catégorie trouvée.';
    }


    $id_category = isset($_GET['id_category']) ? intval($_GET['id_category']) : '';
    $articles = getArticleCategories($id_category, $mysql_connect);

    // if (!$articles) {
    //     die('Erreur : la requête de chargement des re a échoué.');
    // }

    if ($articles->num_rows > 0) {
        while ($row_articles = $articles->fetch_assoc()) {
            $tab_articles[] = $row_articles;
        }

    } else {
        echo 'Aucun résultat';
    }
} else {
    echo "Erreur de connexion à la base de données.";
}

$mysql_connect->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Votre Titre</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
</head>
<body class="container-fluid">
<header>
    <nav class="row flex">
        <div class="col-3 logo"></div>
        <ul class="list col-9 align-right">
            <li><a onclick="location.href='index.php'">Accueil</a></li>
            
            <?php foreach ($tab_categories as $category) { ?>
                <li>
                    <a onclick="location.href='index.php?id_category=<?php echo $category['id']; ?>'">
                        <?php echo htmlspecialchars($category['libelle']); ?>
                    </a>
                </li>           
            <?php } ?>
        </ul>
    </nav>
    <div id="carousel" class="row border">
        <h1>Mon carrousel</h1>
    </div>
</header>
<h1 class="row">Mes articles</h1>
<section class="section">
    <?php foreach ($tab_articles as $article) { ?>
        <article class="col-4">
            <div class="article-card">
                <div class="article-header">
                    <img src="./images/esp2.png" class="article-thumbnail" alt="articles images">
                    <h3><?php echo htmlspecialchars($article['titre']); ?></h3>
                </div>
                <div class="article-content">
                    <p><?php echo htmlspecialchars($article['contenu']); ?></p>
                </div>
            </div>
        </article>
    <?php } ?>
</section>
<footer>
    Mon footer
</footer>
<script src="./script.js" async defer></script>
</body>
</html>
