<?php

class TeamManager extends DbManager{

    function __construct()
    {
        parent::__construct();
    }

    public function getTeams()
    {
        $query = $this->bdd->prepare('SELECT * FROM team ORDER BY points DESC,goals_conceded ,goals_scored DESC');
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    public function addTeam($logo, $name,$points,$goalsScored,$goalsConceded)
    {
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->bdd->prepare('INSERT INTO team (logo, name,points,goals_scored,goals_conceded) VALUES (?, ?,?,?,?)');
            $query->bindParam(1, $logo);
            $query->bindParam(2, $name);
            $query->bindParam(3, $points);
            $query->bindParam(4, $goalsScored);
            $query->bindParam(5, $goalsConceded);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();

        }

    }

    public function deleteTeam($id){
        try {
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = $this->bdd->prepare('DELETE FROM team WHERE id = ?');
            $query->bindParam(1, $id);
            $query->execute();
        }catch(PDOException $e){
            echo  $e->getMessage();

        }
    }

    public function getTeamById($id){
        $query = $this->bdd->prepare('SELECT * FROM team WHERE id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $res = $query->fetch();
        require 'views/team-update-form.php';


    }

    public function updateTeam($id,$team){
        $query = $this->bdd->prepare('UPDATE team SET logo = ? ,name = ? ,points = ?,goals_scored = ?,goals_conceded = ? WHERE id = ?');

        $query->bindParam(1,$team['logo']);
        $query->bindParam(2,$team['name']);
        $query->bindParam(3,$team['points']);
        $query->bindParam(4,$team['goals_scored']);
        $query->bindParam(5,$team['goals_conceded']);
        $query->bindParam(6,$id);
        $query->execute();

    }



}
