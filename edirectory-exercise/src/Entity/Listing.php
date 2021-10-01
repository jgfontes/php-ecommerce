<?php

namespace Jfontes\EdirectoryExercise\Entity;

class Listing{
    private string $Id;
    public string $title;
    public string $address;
    public string $city;
    public string $state;
    public string $description;
    public array $categories = [];

    public function __construct($title, $address, $city, $state, $description, $categories){
        $this->title = $title;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->description = $description;
        $this->categories = $categories;
    }

    public function setId(string $Id){
        $this->Id = $Id;
    }

    public function getId(): string
    {
        return $this->Id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }
}