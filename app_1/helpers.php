<?php
if(!function_exists('rv_date')){
 function rv_date($date){
     return Carbon\Carbon::parse($date)->format('Y-m-d');
 }
}
?>