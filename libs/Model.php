<?php

/**
 * Main View Loader
 */
class Model
{
    public $db;
    public $errors;

    function __construct() {
        $this->db = new JsonDB("./data/");
        $this->db->createTable("users");
        $this->errors = [];
    }
}
