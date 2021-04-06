<html>
<?php include 'parts/head.php';?>
<body>
<div class="container">
    <h1 class="text-center">MODIFICATION DE <?php echo(strtoupper($res['name']))?></h1>
    <form class="form-group" action="index.php?controller=team&action=updatedteam&id=<?php echo($res['id'])?>&logo=<?php echo($res['logo'])?>" method="post" enctype="multipart/form-data">
        <div class="mx-auto" style="width:300px">
            <label for="name">Nom</label>
            <input class="form-control" type="text" name="name" placeholder="nom de l'équipe" value="<?php echo($res['name']) ?>">
            <label for="points">Points</label>
            <input class="form-control" type="number" name="points" placeholder="nombre de points" value="<?php echo(intval($res['points'])) ?>">
            <label for="goals_scored">Buts marqués</label>
            <input class="form-control" type="number" name="goals_scored" placeholder="nombre de buts marqués" value="<?php echo($res['goals_scored']) ?>">
            <label for="goals_conceded">Buts encaissés</label>
            <input class="form-control" type="number" name="goals_conceded" placeholder="nombre de buts encaissés" value="<?php echo($res['goals_conceded']) ?>">
            <label for="logo">Logo</label>
            <input class="form-control" type="file" name="logo" placeholder="choisissez votre logo">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto my-4">MODIFIER</button>
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
