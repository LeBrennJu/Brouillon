<?php

namespace FrontAdmin;

use AltoRouter;
use Controller\UserController;

class Router
{
    public $alto;
    // contient les routes custom de notre front_admin
    public $routes = [];

    public function __construct()
    {
        $this->alto = new AltoRouter();
        $this->createMapping();
        $this->routeMatch();
    }

    // permet de creér les routes que AltoRouter va surveiller
    private function createMapping()
    {
        // route administation
        $this->alto->map('GET', '/user/admin', function () {
            UserController::admin();
        });

        // route update
        $this->alto->map('POST', '/user/update', function () {
            UserController::update();
        });

        // route delete
        $this->alto->map('POST', '/user/delete', function () {
            UserController::delete();
        });

        // route delete confirmation
        $this->alto->map('POST', '/user/delete_confirm', function () {
            UserController::deleteConfirm();
        });

        // route update post
        $this->alto->map('POST', '/user/card/update', function () {
            UserController::cardUpdate();
        });

        // route new project view
        $this->alto->map('GET', '/user/project/new', function () {
            UserController::viewAddProject();
        });

        // route create project
        $this->alto->map('POST', '/user/project/new', function () {
            UserController::addProject();
        });

        // route remove skill view
        $this->alto->map('GET', '/user/skill/remove', function () {
            UserController::viewListSkill();
        });

        // route remove skill
        $this->alto->map('POST', '/user/skill/remove', function () {
            UserController::removeSkill();
        });
    }

    private function routeMatch()
    {
        $match = $this->alto->match();
        if (is_array($match) && is_callable($match['target'])) {
            http_response_code(200);
            call_user_func_array($match['target'], $match['params']);
        }
    }
}
