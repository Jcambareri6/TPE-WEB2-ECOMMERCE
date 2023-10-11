<?php
class adminView{
    function ShowDashboard($Items,$marcas){

        require './Templates/AdminDashBoard.phtml';
    }

    function ShowFormAdd($error,$marcas){
        require './Templates/formAdd.phtml';
    }
    function ShowError($error){
        require './Templates/error.phtml';
    }

    
}