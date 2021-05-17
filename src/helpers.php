<?php

if(!function_exists('page')) {
    function page (array $estructura) {
        $page_template_1 = new Wrapper();
        echo $page_template_1->page($estructura);
    }
}