<?php

function formatPhoneNum($nomorHP)
{
    $nomorHP = preg_replace('/[^0-9]/', '', $nomorHP);
    if (strlen($nomorHP) > 0) {
        if ($nomorHP[0] === '0') {
            $nomorHP = '+62' . substr($nomorHP, 1);
        } elseif (substr($nomorHP, 0, 2) !== '62') {
            $nomorHP = '+62' . $nomorHP;
        }
    }
    return $nomorHP;
}
