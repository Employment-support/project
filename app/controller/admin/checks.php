<?php

function datas_check($datas)
{
    if (is_array($datas)) {
        foreach ($datas as $data) {
            // print_r($data);
            $keys = array_keys($data);
        }
    } else {
        $keys = false;
    }

    return $keys;
}