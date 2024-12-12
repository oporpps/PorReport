<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class Repair extends BaseModel {

        public $__table__ = "repair_requests";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }