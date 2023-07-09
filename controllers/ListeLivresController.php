<?php

class ListeLivresController {
    private $connection;
    private $livre;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->livre = new Livre($connection);
    }

    public function getListeLivres() {
        return $this->livre->getListeLivres();
    }

    public function getViewData() {
        $livres = $this->getListeLivres();
        return ['livres' => $livres];
    }
}
