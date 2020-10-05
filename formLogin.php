<?php
//bdd
$users = ["julien" => "pass", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];

// messages callback
$feedback = "";
$message = "You're logged in!";
$validation_error = "* Incorrect username or password.";
$username = "";

// traitement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isset($users[$username]) && $users[$username] === $password){
        $feedback = $message;
    } else {
        $feedback = $validation_error;
    }
}

?>
<!--form login-->
<h3>Form login</h3>
<form method="post" action="">
  <label>
      Username:
        <input type="text" name="username" value="<?php echo $username;?>">
    </label>
    <br>
   <label>
       Password:
        <input type="text" name="password" value="">
    </label>
    <br>
    <input type="submit" value="Log in">
</form>
<span class="feedback"><?= $feedback;?></span>
