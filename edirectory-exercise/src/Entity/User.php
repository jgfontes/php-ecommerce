<?php

namespace Jfontes\EdirectoryExercise\Entity;

class User{
    private string $Id;
    public string $username;
    public string $email;
    public string $telephone;
    public string $password;
    private array $Listing;

    public function __construct($username, $email, $telephone, $password){
        $this->username = $username;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    //Getters methods
    public function getId(): string
    {
        return $this->Id;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelephone(): string
    {
        return $this->telephone;
    }
    public function getPassword(){
        return $this->password;
    }

    //Setter methods
    public function defineId(string $id): void
    {
        if(isset($this->Id)){
            throw new \DomainException('Você só pode definir o ID uma vez');
        }
        $this->Id=$id;
    }
    public function defineHashedPassword(string $password): void
    {
        $this->password=$password;
    }

    public function verifyPassword($pwdToBeVerified): bool
    {
        if (password_verify($pwdToBeVerified, $this->password)) {
            return true;
        }
        else {
            return false;
        }
    }
}