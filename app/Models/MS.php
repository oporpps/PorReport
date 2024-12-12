<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class MS extends BaseModel {

        public $__table__ = "messages";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }