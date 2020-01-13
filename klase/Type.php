<?php
class Type
{
    private $typeID;
    private $typeName;

    /**
     * Type constructor.
     * @param $typeID
     * @param $typeName
     */
    public function __construct($typeID, $typeName)
    {
        $this->typeID = $typeID;
        $this->typeName = $typeName;
    }

    /**
     * @return mixed
     */
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * @param mixed $typeID
     */
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;
    }

    /**
     * @return mixed
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    /**
     * @param mixed $typeName
     */
    public function setTypeName($typeName)
    {
        $this->typeName = $typeName;
    }



}