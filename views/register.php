<html>
<?php include 'parts/head.php';?>
<body>
<div class="container">
    <h1 class="text-center">S'INSCRIRE</h1>
    <form class="form-group" action="index.php?controller=user&action=submiteduser" method="post" enctype="multipart/form-data">
        <div class="mx-auto" style="width:300px">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="password">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-auto my-4">S'INSCRIRE !</button>
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
