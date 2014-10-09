<?php

namespace GSB\Domain;


use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface{
    
    private $visitorId;
    private $sectorId;
    private $laboratoryId;
    private $visitorLastName;
    private $visitorFirstName;
    private $visitorAddress;
    private $visitorZipCode;
    private $visitorCity;
    private $hiringDate;
    private $userName;
    private $password;
    private $salt;
    private $role;
    private $visitorType;
    
    public function getVisitorId() {
        return $this->visitorId;
    }

    public function getSectorId() {
        return $this->sectorId;
    }

    public function getLaboratoryId() {
        return $this->laboratoryId;
    }

    public function getVisitorLastName() {
        return $this->visitorLastName;
    }

    public function getVisitorFirstName() {
        return $this->visitorFirstName;
    }

    public function getVisitorAddress() {
        return $this->visitorAddress;
    }

    public function getVisitorZipCode() {
        return $this->visitorZipCode;
    }

    public function getVisitorCity() {
        return $this->visitorCity;
    }

    public function getHiringDate() {
        return $this->hiringDate;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function getVisitorType() {
        return $this->visitorType;
    }

    public function setVisitorId($visitorId) {
        $this->visitorId = $visitorId;
    }

    public function setSectorId($sectorId) {
        $this->sectorId = $sectorId;
    }

    public function setLaboratoryId($laboratoryId) {
        $this->laboratoryId = $laboratoryId;
    }

    public function setVisitorLastName($visitorLastName) {
        $this->visitorLastName = $visitorLastName;
    }

    public function setVisitorFirstName($visitorFirstName) {
        $this->visitorFirstName = $visitorFirstName;
    }

    public function setVisitorAddress($visitorAddress) {
        $this->visitorAddress = $visitorAddress;
    }

    public function setVisitorZipCode($visitorZipCode) {
        $this->visitorZipCode = $visitorZipCode;
    }

    public function setVisitorCity($visitorCity) {
        $this->visitorCity = $visitorCity;
    }

    public function setHiringDate($hiringDate) {
        $this->hiringDate = $hiringDate;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setVisitorType($visitorType) {
        $this->visitorType = $visitorType;
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

