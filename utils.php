<?php
    function getArticleCategories($id_category = '', $mysqli)
    {
        $sql_articles = ($id_category !== '') ? "SELECT * FROM Article WHERE id = ?" : "SELECT * FROM Article";
        $stmt = $mysqli->prepare($sql_articles);

        if (!$stmt) {
            die('Erreur : préparation de la requête a échoué.');
        }

        if ($id_category !== '') {
            $stmt->bind_param("i", $id_category);
        }

        if (!$stmt->execute()) {
            die('Erreur : l\'exécution de la requête a échoué.');
        }

        $articles = $stmt->get_result();

        $stmt->close();

        return $articles;
    }


    function getCategories($mysqli) {
        $sql_categories = "SELECT * FROM Categorie";
        
        $stmt = $mysqli->prepare($sql_categories);
        // die($sql_categories);
        if (!$stmt) {
            die('Erreur : la préparation de la requête a échoué.');
        }

        if (!$stmt->execute()) {
            die('Erreur:l\'exécution de la requête a échoué.');
        }

        $categories = $stmt->get_result();
        $stmt->close();

        
        return $categories;
    }












?>

