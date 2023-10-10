<?php
class adminView{
    function ShowDashboard($Items){

        require './Templates/AdminDashBoard.phtml';
    }
    function ShowFormAdd(){
        require './Templates/formAdd.phtml';
    }
    function ShowError(){
        require './Templates/error.phtml';
    }
}