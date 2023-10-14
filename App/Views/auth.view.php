<?php

class AuthView {
    public function showLogin($error = null,$marcas){
        require './templates/login.phtml';
    }
}