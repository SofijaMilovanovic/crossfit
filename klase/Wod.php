<?php
class Wod
{
    private $wodID;
    private $wodName;
    private $wodDesc;
    private $type;
    private $difficulty;

    /**
     * Wod constructor.
     * @param $wodID
     * @param $wodName
     * @param $wodDesc
     * @param $type
     * @param $difficulty
     */
    public function __construct($wodID, $wodName, $wodDesc, $type, $difficulty)
    {
        $this->wodID = $wodID;
        $this->wodName = $wodName;
        $this->wodDesc = $wodDesc;
        $this->type = $type;
        $this->difficulty = $difficulty;
    }

    /**
     * @return mixed
     */
    public function getWodID()
    {
        return $this->wodID;
    }

    /**
     * @param mixed $wodID
     */
    public function setWodID($wodID)
    {
        $this->wodID = $wodID;
    }

    /**
     * @return mixed
     */
    public function getWodName()
    {
        return $this->wodName;
    }

    /**
     * @param mixed $wodName
     */
    public function setWodName($wodName)
    {
        $this->wodName = $wodName;
    }

    /**
     * @return mixed
     */
    public function getWodDesc()
    {
        return $this->wodDesc;
    }

    /**
     * @param mixed $wodDesc
     */
    public function setWodDesc($wodDesc)
    {
        $this->wodDesc = $wodDesc;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param mixed $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }


}