<?php
Class Liked extends Theme {
    public static $page_data = array('title' => 'People i liked');
    public static $partial = 'liked';
    public static function init_data() {
        global $config;
        parent::init_data();
        if (isset(self::$page_data['title']) && self::$page_data['title'] !== '') {
            parent::$data['title'] = ucfirst(__('People i liked')) . ' . ' . $config->site_name;
        }
        parent::$data['name']  = self::$partial;
        parent::$data['liked'] = self::LikedData();
    }
    public static function show($partial = array()) {
        self::init_data();
        parent::show(self::$partial);
    }
    public static function LikedData() {
        global $_AJAX, $_CONTROLLERS;
        $data            = '';
        $ajax_class      = realpath($_CONTROLLERS . 'aj.php');
        $ajax_class_file = realpath($_AJAX . 'loadmore.php');
        if (file_exists($ajax_class_file)) {
            require_once $ajax_class;
            require_once $ajax_class_file;
            $_POST['page'] = 1;
            $loadmore      = new Loadmore();
            $match_users   = $loadmore->liked_users();
            if (isset($match_users['html'])) {
                $data = $match_users['html'];
            }
        }
        return $data;
    }
}