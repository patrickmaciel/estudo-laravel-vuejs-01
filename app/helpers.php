<?php

function dateBrToDb($data)
{
    // mysql pra br
    // $data = implode("/",array_reverse(explode("-",$data)));
    return implode(''-'',array_reverse(explode(''/'',$data)));
}
