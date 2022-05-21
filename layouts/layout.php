<!DOCTYPE html>
<html>
    <head>
        <title>Projet PHP - Estiam</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=PATH_CSS?>/messagerie.css">
        <link rel="stylesheet" href="<?=PATH_CSS?>/popin.css">
        <script src="<?=PATH_JS?>/messenger.js"></script>
        <script src="<?=PATH_JS?>/connexion.js"></script>
        <script src="<?=PATH_JS?>/nouveau_user.js"></script>
    </head>

    <body>
        <header>
            <nav class="menu">
            </nav>
         </header>
        
        <section> 
            <?php 
            //On appelle la vue
            include_once 'views/'.$pageName;
            ?>  
        </section> 
        <footer></footer> 

    </body>
</html>   