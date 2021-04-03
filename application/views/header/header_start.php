<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php if(isset($meta_tags) && (isset($brand_name) || isset($event_name))){ ?>
    <title><?php echo isset($brand_name)?$brand_name:$event_name; ?></title>
    	<?php echo $meta_tags; ?>

   <?php } else{ ?>

   <?php } ?>
    