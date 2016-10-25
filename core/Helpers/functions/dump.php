<?php

    function dd($value)
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';

        die();
    }

    function vd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';

        die();
    }