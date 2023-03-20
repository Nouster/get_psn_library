<?php

class Game {
    private int $id;
    private string $name;
    private string $picture;
    private string $description;
    private DateTime $releaseGame;
    private DateTime $startGame;
    private bool $getting;

    public function __construct(int $id, string $name, string $picture, string $description, DateTime $releaseGame, DateTime $startGame, bool $getting) {
        $this->id = $id;
        $this->name = $name;
        $this->picture = $picture;
        $this->description = $description;
        $this->releaseGame = $releaseGame;
        $this->startGame = $startGame;
        $this->getting = $getting;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPicture(): string {
        return $this->picture;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getReleaseGame(): DateTime {
    
        return $this->releaseGame;
    }

    public function getStartGame(): DateTime {
        return $this->startGame;
    }

    public function getIsGetting(): bool {
        return $this->getting;
    }


    public function setName(string $name) {
        $this->name = $name;
    }

    public function setPicture(string $picture) {
        $this->picture = $picture;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setReleaseGame(DateTime $releaseGame) {
        $this->releaseGame = $releaseGame;
    }

    public function setStartGame(DateTime $startGame) {
        $this->startGame = $startGame;
    }

    public function setGetting(bool $getting) {
        $this->getting = $getting;
    }
}
