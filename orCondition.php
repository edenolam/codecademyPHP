<?php
function willWeEat($mealType, $is_hungry)
{
    if($mealType == "dessert" || $is_hungry){
        return "Yum. Thanks!";
    }else{
        return "No thanks. We're not hungry.";
    }
}

echo willWeEat("dessert", true);
echo willWeEat("meat", false);
