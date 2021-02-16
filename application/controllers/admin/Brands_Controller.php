<?php

class Brands_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Brands_Model','bm');
    }

    public function brand_list()
    {
        
    }
}
?>