<?php
namespace controllers;

class IndexController {

    private $view = 'home.php';
    private $container;

    public function __construct(\Interop\Container\ContainerInterface $container) {
        $this->container = $container;
    }

    public function get($request, $response, $args) {

        $response = $this->container->get('view')->render($response, $this->view, []);

        return $response;
    }
}