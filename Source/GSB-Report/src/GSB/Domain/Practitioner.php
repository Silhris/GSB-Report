<?php

namespace GSB\Domain;

class Practitioner 
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
    private $name;

    /**
     * Content.
     *
     * @var string
     */
    private $firstName;

    /**
     * Side effects.
     *
     * @var string
     */
    private $address;

    /**
     * Contraindication.
     *
     * @var char
     */
    private $zipCode;

    /**
     * Sample price.
     *
     * @var string
     */
    private $city;

    /**
     * Family.
     *
     * @var \GSB\Domaine\Family
     */
    
    
    private $notoCoeff;
    
    /* Practitioner_type.
     *
     * @var integer
     */
    private $type;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
    
    public function getNotoCoeff() {
        return $this->notoCoeff;
    }

    public function setNotoCoeff($notoCoeff) {
        $this->notoCoeff = $notoCoeff;
    }
    
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}