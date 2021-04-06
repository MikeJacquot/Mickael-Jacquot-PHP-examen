<?php

class Team
{

    private $id;
    private $logo ;
    private $name;
    private $points;
    private $goalsScored;
    private $goalsConceded;

    /**
     * Team constructor.
     * @param $id
     * @param $logo
     * @param $points
     * @param $goalsConceded
     * @param $goalsScored
     */
    public function __construct($id = null, $logo, $name, $points, $goalsScored, $goalsConceded)
    {
        $this->id = $id;
        $this->logo = $logo;
        $this->name = $name;
        $this->points = $points;
        $this->goalsScored = $goalsScored;
        $this->goalsConceded = $goalsConceded;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param mixed $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getGoalsConceded()
    {
        return $this->goalsConceded;
    }

    /**
     * @param mixed $goalsConceded
     */
    public function setGoalsConceded($goalsConceded)
    {
        $this->goalsConceded = $goalsConceded;
    }

    /**
     * @return mixed
     */
    public function getGoalsScored()
    {
        return $this->goalsScored;
    }

    /**
     * @param mixed $goalsScored
     */
    public function setGoalsScored($goalsScored)
    {
        $this->goalsScored = $goalsScored;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }






}
