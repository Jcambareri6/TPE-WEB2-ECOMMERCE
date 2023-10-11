<?php
class adminView{
    function ShowDashboard($Items){

        require './Templates/AdminDashBoard.phtml';
    }
    function ShowFormAdd($error){
        require './Templates/formAdd.phtml';
    }
    function ShowError($error){
        require './Templates/error.phtml';
    }
}