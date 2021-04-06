<?php

class TeamController
{
    private $teamManager;

    public function __construct()
    {
        $this->teamManager = new TeamManager();
    }


    public function displayScoreBoard()
    {
        if (empty($_SESSION)) {
            require 'views/scoreboard.php';
        } else {
            require 'views/editable-scoreboard.php';
        }
    }

    public function displayAddForm()
    {
        require 'views/team-add-form.php';
    }

    public function addTeam()
    {
        $uniqueName = null;
        $errorsForm = [];
        $authorized = ['jpg', 'png', 'jpeg', 'ico'];

        if (empty($_POST['name'])) {
            $errorsForm[] = 'saisissez un nom d\'équipe';
        }
        if (empty($_POST['points'])) {
            $errorsForm[] = 'saisissez un nombre de points';
        }
        if (empty($_POST['goals_scored'])) {
            $errorsForm[] = 'saisissez un nombre de buts marqués';
        }
        if (empty($_POST['goals_conceded'])) {
            $errorsForm[] = 'saisissez un nombre de buts encaissés';
        }
        if ($_FILES['logo']['size'] != 0) {
            $fileExt = explode('.', $_FILES['logo']['name'])[1];
            if (in_array($fileExt, $authorized)) {
                $uniqueName = uniqid() . '.' . $fileExt;
                move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/' . $uniqueName);
            }
        } else {
            $uniqueName = 'noimg.png';
            if (count($errorsForm) == 0) {

                $this->teamManager->addTeam($uniqueName, $_POST['name'], $_POST['points'], $_POST['goals_scored'], $_POST['goals_conceded']);
                header('Location: index.php?controller=team&action=home');
            } else {
                require 'views/team-add-form.php';
            }
        }

    }

    public function deleteTeam($id)
    {
        $this->teamManager->deleteTeam($id);
        header('Location: index.php?controller=team&action=home');
    }

    public function displayFilledForm($id)
    {
        $this->teamManager->getTeamById($id);
    }

    public function updateTeam($id, $logoName)
    {
        $errorsForm = [];
        $authorized = ['jpg', 'png', 'jpeg', 'ico'];

        if (empty($_POST['name'])) {
            $errorsForm[] = 'saisissez un nom d\'équipe';
        }
        if (empty($_POST['points'])) {
            $errorsForm[] = 'saisissez un nombre de points';
        }
        if (empty($_POST['goals_scored'])) {
            $errorsForm[] = 'saisissez un nombre de buts marqués';
        }
        if (empty($_POST['goals_conceded'])) {
            $errorsForm[] = 'saisissez un nombre de buts encaissés';
        }
        if (count($errorsForm) == 0) {

            if ($_FILES['logo']['size'] != 0) {
                $fileExt = explode('.', $_FILES['logo']['name'])[1];
                if (in_array($fileExt, $authorized)) {
                    if($logoName != 'noimg.png'){
                        move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/' . $logoName);
                    }else{
                        $uniqueName = uniqid() . '.' . $fileExt;
                        move_uploaded_file($_FILES['logo']['tmp_name'], 'uploads/' . $uniqueName);
                        $logoName = $uniqueName;
                    }


                }
            }


            $newTeam['id'] = $id;
            $newTeam['name'] = $_POST['name'];
            $newTeam['points'] = $_POST['points'];
            $newTeam['goals_scored'] = $_POST['goals_scored'];
            $newTeam['goals_conceded'] = $_POST['goals_conceded'];
            $newTeam['logo'] = $logoName;
            $this->teamManager->updateTeam($id, $newTeam);
            header('Location: index.php?controller=team&action=home');


        } else {
            $this->teamManager->getTeamById($id);
        }


    }
}
