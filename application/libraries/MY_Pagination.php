<?php
class MY_Pagination extends CI_Pagination {

    public function __construct() {
        parent::__construct();
    }

    public function current_place() {
        return $this->cur_page;
    }
}

?>