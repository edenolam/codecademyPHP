<?php

function duckDuckGoose($is_goose = false)
{
    if (!$is_goose){
        return "duck";
    } else{
        return "goose!";
    }
}

echo duckDuckGoose(false);
echo duckDuckGoose(!true);
echo duckDuckGoose(!false);
