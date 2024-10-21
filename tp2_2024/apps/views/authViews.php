<?php

class authView{

    function showLogin($error = null) {
        require_once './templates/header.phtml';
        require_once './templates/formLogin.phtml';
        require_once './templates/footer.phtml';
    }

}