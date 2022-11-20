<?php
    class Suit{
        public $id;
        public $name;
        public $size;
        public $color;
        public $img;
        // Methods
        function set_name($name) {
          $this->name = $name;
        }
    }
    
    function includeFileWithVariables($fileName, $variables) {
        extract($variables);
        include($fileName);
     }

?>