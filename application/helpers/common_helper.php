<?php

function admin_url($url = null){
    return $_ENV['ADMIN_URL']."/".$url;
}
?>