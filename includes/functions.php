<?php

use google\appengine\api\users\User;
use google\appengine\api\users\UserService;

function getUser() {

    $user = UserService::getCurrentUser();

    if ($user) {
        return $user;
    }
    else {
        return null;
    }
}

function getLoginUrl() {
    return UserService::createLoginURL("/mail");
}

function getLogoutUrl() {
    return UserService::createLogoutURL("/");
}