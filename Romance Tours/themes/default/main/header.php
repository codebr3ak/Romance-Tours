<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title'];?></title>
    <?php require( $theme_path . 'main' . $_DS . 'meta.php' );?>
    <?php require( $theme_path . 'main' . $_DS . 'style.php' );?>
    <?php require( $theme_path . 'main' . $_DS . 'custom-header-js.php' );?>
    <?php //include $data->partial_dir . 'main' . _DS . 'onesignal.php';?>
    <?php require( $theme_path . 'main' . $_DS . 'ajax.php' );?>
</head>
<body class="<?php echo $data['name'];?>-page">
    <?php echo $config->google_tag_code;?>
    <div id="loader" class="dt_ajax_progress"></div>
