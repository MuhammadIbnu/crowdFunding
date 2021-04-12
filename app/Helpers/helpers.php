<?php
if (! function_exists('moneyFormat')) {
    # code...
    function moneyFormat($str){
        return 'Rp. ' . number_format($str, '0','','.');
    }
}
?>