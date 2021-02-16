<?php

class Brands_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_Model','bm');
    }
}
?>