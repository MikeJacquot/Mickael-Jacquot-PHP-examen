<html>
<?php include 'parts/head.php';?>
<body>
<div class="container">
    <h1 class="text-center">Login</h1>
    <form class="form-group" action="index.php?controller=user&action=submitform" method="post">
        <div class="mx-auto" style="width:300px">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="password">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto my-4">LOGIN !</button>
                <a style="display:block" class="my-4" href="index.php?controller=user&action=registerview">Pas encore enregistré ?</a>
                <a style="display:block" class="btn btn-primary mx-auto my-4" href="index.php?controller=team&action=home">CONNEXION EN INVITÉ</a>


            </div>
            <?php

            if(isset($errorsForm) && count($errorsForm) != 0){
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

