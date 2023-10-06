<?php

class AuthView {
    public function showLogin($error = null){
        require './Templates/login.phtml';
    }
}