<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    /**
     * Visitor id.
     *
     * @var integer
     */
    private $id;

    /**
     * Visitor sector
     *
     * @var integer
     */
//    private $sector;

    /**
     * Visitor laboratory
     *
     * @var string
     */
//    private $laboratory;

    /**
     * Visitor lastName
     *
     * @var string
     */
    private $lastName;
    
    /**
     * Visitor firstName
     *
     * @var string
     */
    private $firstName;

    /**
     * Visitor address
     * 
     *
     * @var string
     */
    private $address;
    
    /**
     * Visitor zipCode
     * 
     *
     * @var char(5)
     */
    private $zipCode;
    
    /**
     * Visitor city
     * 
     *
     * @var string
     */
    private $city;
    
    /**
     * Visitor hiringDate
     * 
     *
     * @var date
     */
    private $hiringDate;
    
    /**
     * Visitor userName
     * 
     *
     * @var string
     */
    private $userName;
    
    /**
     * Visitor password
     * 
     *
     * @var string
     */
    private $password;
    
    /**
     * Visitor salt
     * 
     *
     * @var string
     */
    private $salt;
    
    /**
     * Visitor role
     *
     * @var string
     */
    private $role;
    
    /**
     * Visitor type
     *
     * @var char(1)
     */
    private $type;

    public function getId(){
            return $this->id;
    }

    public function setId($id){
            $this->id = $id;
    }

//    public function getSector(){
//            return $this->sector;
//    }
//
//    public function setSector($sector){
//            $this->sector = $sector;
//    }

//    public function getLaboratory(){
//            return $this->laboratory;
//    }
//
//    public function setLaboratory($laboratory){
//            $this->laboratory = $laboratory;
//    }

    public function getLastName(){
            return $this->lastName;
    }

    public function setLastName($lastName){
            $this->lastName = $lastName;
    }

    public function getFirstName(){
            return $this->firstName;
    }

    public function setFirstName($firstName){
            $this->firstName = $firstName;
    }

    public function getAddress(){
            return $this->address;
    }

    public function setAddress($address){
            $this->address = $address;
    }

    public function getZipCode(){
            return $this->zipCode;
    }

    public function setZipCode($zipCode){
            $this->zipCode = $zipCode;
    }

    public function getCity(){
            return $this->city;
    }

    public function setCity($city){
            $this->city = $city;
    }

    public function getHiringDate(){
            return $this->hiringDate;
    }

    public function setHiringDate($hiringDate){
            $this->hiringDate = $hiringDate;
    }
    
    public function getUserName(){
            return $this->userName;
    }

    public function setUserName($userName){
            $this->userName = $userName;
    }

    public function getPassword(){
            return $this->password;
    }

    public function setPassword($password){
            $this->password = $password;
    }

    public function getSalt(){
            return $this->salt;
    }

    public function setSalt($salt){
            $this->salt = $salt;
    }

    public function getRole(){
            return $this->role;
    }

    public function setRole($role){
            $this->role = $role;
    }

    public function getType(){
            return $this->type;
    }

    public function setType($type){
            $this->type = $type;
    }
    
    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }
    
    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
}