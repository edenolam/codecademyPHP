<?php

$bad_email = 'fake - at - prank dot com';
$email = "julienbasquin@hotmail.fr";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}



