<?php
require_once('includes.php');
require('parts/head.php');
?>
<h1 class="my-5 text-center">CLASSEMENT LIGUE 1 VERSION EDITABLE</h1>
<div class="container">
    <a type="button" href="index.php?controller=team&action=add" class="btn btn-success">AJOUTER</a>

    <table class="table table-striped shadow my-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Logo</th>
            <th scope="col">Nom</th>
            <th scope="col">Points</th>
            <th scope="col">Buts Marqués</th>
            <th scope="col">Buts Encaissés</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody>
        <?php $tm = new TeamManager();
        $res = $tm->getTeams();
        foreach($res as $team):?>
            <tr class="align-middle">
                <th scope="row" ><?= $team['id'] ?></th>
                <td><img style="width:150px; height:150px" class="img-fluid" src="<?= 'uploads/'.$team['logo'] ?>" alt="image"></td>
                <td style="font-size:30px"><?= $team['name'] ?></td>
                <td style="font-size:30px"><?= $team['points'] ?></td>
                <td style="font-size:30px"><?= $team['goals_scored'] ?></td>
                <td style="font-size:30px"><?= $team['goals_conceded'] ?></td>
                <td>
                    <a type="button" href="index.php?controller=team&action=updateform&id=<?= $team['id'] ?>" class="btn btn-warning">MODIFIER</a>
                    <a type="button" href="index.php?controller=team&action=delete&id=<?= $team['id'] ?>&logo=<?= $team['logo'] ?>" class="btn btn-danger">SUPPRIMER</a></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
