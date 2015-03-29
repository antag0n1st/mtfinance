<?php

class IndexController extends Controller {

    public function main() {

        global $view;
        
        if (Membership::instance()->user->user_level <= 0) {
            $view = 'login';
        }
    }

}

?>