<?php session_start();
require_once('includes.php');

$userController = new UserController();
$teamController = new TeamController();


if (empty($_GET)) {
    header('Location: index.php?controller=user&action=login');
}
if ($_GET['controller'] == 'dashboard') {
    if (empty($_SESSION)) {
        header('Location: index.php?controller=user&action=login');
    }
}


if ($_GET['controller'] == 'user' && $_GET['action'] == 'login') {
    $userController->displayLoginForm();
} elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'submitform') {
    $userController->logUser();
} elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'registerview') {
    $userController->displayRegisterForm();
} elseif ($_GET['controller'] == 'user' && $_GET['action'] == 'submiteduser') {
    $userController->registerUser();
} elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'home') {
    $teamController->displayScoreboard();
} elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'add') {
    $teamController->displayAddForm();
} elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'submitedteam') {
    $teamController->addTeam();
}elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'delete') {
    $teamController->deleteTeam($_GET['id']);
}elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'updateform') {
    $teamController->displayFilledForm($_GET['id']);
}elseif ($_GET['controller'] == 'team' && $_GET['action'] == 'updatedteam'){
    $teamController->updateTeam($_GET['id'],$_GET['logo']);

} else {
    throw new Exception('Page introuvable', 404);
}
