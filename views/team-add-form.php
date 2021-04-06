<html>
<?php include 'parts/head.php';?>
<body>
<div class="container">
    <h1 class="text-center">AJOUT D'UNE ÉQUIPE</h1>
    <form class="form-group" action="index.php?controller=team&action=submitedteam" method="post" enctype="multipart/form-data">
        <div class="mx-auto" style="width:300px">
            <label for="name">Nom</label>
            <input class="form-control" type="text" name="name" placeholder="nom de l'équipe">
            <label for="points">Points</label>
            <input class="form-control" type="number" name="points" placeholder="nombre de points">
            <label for="goals_scored">Buts marqués</label>
            <input class="form-control" type="number" name="goals_scored" placeholder="nombre de buts marqués">
            <label for="goals_conceded">Buts encaissés</label>
            <input class="form-control" type="number" name="goals_conceded" placeholder="nombre de buts encaissés">
            <label for="logo">Logo</label>
            <input class="form-control" type="file" name="logo" placeholder="choisissez votre logo">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto my-4">AJOUTER</button>
            </div>
            <?php
            if(isset($errorsForm)){
                echo('<div class="alert alert-danger">');
                foreach ($errorsForm as $error){

                    echo($error.'<br>');
                }

                echo('</div>');
            }

            ?>
        </div>

    </form>
</div>



</body>

</html>
