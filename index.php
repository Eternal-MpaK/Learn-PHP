<?php
    session_start();
    require_once "settings/session.php";
    require_once "settings/view.php";

    $routes = explode("/", $_SERVER['REQUEST_URI']);

    $controller_name = 'main';
    $action_name = 'index';

    if (!empty($routes[1])) {
        $controller_name = $routes[1];
    }

    if (!empty($routes[2])) {
        $action_name = $routes[2];
    }

    $file_name = 'controllers/' . strtolower($controller_name). '.php';

    try {
        if (file_exists($file_name)) {
            require_once $file_name;
        } else {
            throw new Exception('File not found');
        }

        $class_name = '\App\\' . ucfirst($controller_name);

        if (class_exists($class_name)) {
            $controller = new $class_name();
        } else {
            throw new Exception('File found but class not found');
        }

        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            throw new Exception('Method not found');
        }
    } catch (Exception $e) {
        require 'errors/404.php';
    }