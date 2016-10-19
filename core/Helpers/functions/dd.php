<?php

    if(function_exists('dd'))
        return;

    function dd($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';

        die();
    }