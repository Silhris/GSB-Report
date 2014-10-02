<?php

namespace GSB\Domain;

class PractitionerType 
{
    /**
     * Practitioner id.
     *
     * @var integer
     */
    private $id;

    /**
     * Trade name.
     *
     * @var string
     */
    private $typeName;

    /**
     * Content.
     *
     * @var string
     */
    private $typePlace;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTypeName() {
        return $this->typeName;
    }

    public function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    public function getTypePlace() {
        return $this->typePlace;
    }

    public function setTypePlace($typePlace) {
        $this->typePlace = $typePlace;
    }
}