<?php

$bad_email = 'fake - at - prank dot com';
$email = "julienbasquin@hotmail.fr";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}


// Write your code here:
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_url = $_POST["url"];
    if (!filter_var($user_url, FILTER_VALIDATE_URL)) {
        $validation_error = "* This is an invalid URL.";
        $form_message = "Please retry and submit your form again.";
    } else {
        $form_message = "Thank you for your submission.";
    }
}
?>

<form method="post" action="">
    Your Favorite Website:
    <br>
    <label>
        <input type="text" name="url" value="<?php echo $user_url; ?>">
    </label>
    <span class="error"><?= $validation_error; ?></span>
    <br>
    <input type="submit" value="Submit">
</form>
<p> <?= $form_message; ?> </p>


<!--birthday-->
<?php
$message = "";
$month_error = "";
$day_error = "";
$year_error = "";

// Create your variables here:
$month_options = ["options" => ["min_range" => 1, "max_range" => 12]];
$day_options = ["options" => ["min_range" => 1, "max_range" => 31]];
$year_options = ["options" => ["min_range" => 1903, "max_range" => 2020]];


// Define your function here:

function validateInput($type, &$error, $options_arr)
{
    $var = filter_var($_POST[$type], FILTER_VALIDATE_INT, $options_arr);
    if (!$var) {
        $error = "* Invalid ${type}";
        return false;
    } else {
        return true;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uncomment the code below:
    $test_month = validateInput("month", $month_error, $month_options);
    $test_day = validateInput("day", $day_error, $day_options);
    $test_year = validateInput("year", $year_error, $year_options);
    if ($test_month && $test_day && $test_year) {
        $message = "Your birthday is: {$_POST["month"]}/{$_POST["day"]}/{$_POST["year"]}";
    }
}

?>

<form method="post" action="">
    Enter your birthday:
    <br>
    Month: <input type="number" name="month" value="<?= $_POST["month"]; ?>">
    <span class="error"><?= $month_error; ?>		</span>
    <br>
    Day: <input type="number" name="day" value="<?= $_POST["day"]; ?>">
    <span class="error"><?= $day_error; ?>		</span>
    <br>
    Year: <input type="number" name="year" value="<?= $_POST["year"]; ?>">
    <span class="error"><?= $year_error; ?>		</span>
    <br>
    <input type="submit" value="Submit">
</form>
<p><?= $message; ?></p>


<!---->


<?php
$feedback = "";
$success_message = "Thank you for your donation!";
$error_message = "* There was an error with your card. Please try again.";

$card_type = "";
$card_num = "";
$donation_amount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_type = $_POST["credit"];
    $card_num = $_POST["card-num"];
    $donation_amount = $_POST["amount"];

// Write your code here:


    if (strlen($card_num) < 100) {
        if ($card_type === "mastercard") {
            if (preg_match("/5[1-5][0-9]{14}/", $card_num) === 1) {
                $feedback = $success_message;
            } else {
                $feedback = $error_message;
            }
        } elseif ($card_type === "visa") {
            if (preg_match("/4[0-9]{12}([0-9]{3})?([0-9]{3})?/", $card_num) === 1) {
                $feedback = $success_message;
            } else {
                $feedback = $error_message;
            }
        }
    } else {
        $feedback = $error_message;
    }

}
?>
<form action="" method="POST">
    <h1>Make a donation</h1>
    <label for="amount">Donation amount?</label>
    <input type="number" name="amount" value="<?= $donation_amount; ?>">
    <br><br>
    <label for="credit">Credit card type?</label>
    <select name="credit" value="<?= $card_type; ?>">
        <option value="mastercard">Mastercard</option>
        <option value="visa">Visa</option>
    </select>
    <br><br>
    <label for="card-num">Card number?</label>
    <input type="number" name="card-num" value="<?= $card_num; ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>
<span class="feedback"><?= $feedback; ?></span>


