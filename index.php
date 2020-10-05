<html lang="">
<body>
<form method="post" action="">
    Your name:
    <br>
    <input type="text" name="name">
    <br><br>
    What is the best thing about learning to code:
    <br>
    <input type="text" name="best">
    <br><br>
    <input type="submit" value="Submit Answers">
</form>
<div id="form-output">
    <p id="name"><?= $_POST['name'] ?></p>
    <p id="best"><?= $_POST['best'] ?></p>
</div>
<a href="index.php">Reset</a>
</body>
</html>

<?php
function checkWord($input, $letter)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && strtolower($input[0]) != $letter) {
        return "* This word must start with the letter ${letter}!";
    }else{
        return "";
    }
}
?>
<h1>Time to Practice our ABCs</h1>
<form method="post" action="">
    Enter a word that starts with the letter "a":
    <br>
    <label for="a-word"></label>
    <input type="text" name="a-word" id="a-word" value="<?= $_POST["a-word"];?>">
    <br>
    <p id="a-error"><?= checkWord($_POST["a-word"], "a");?></p>
    <br>
    Enter a word that starts with the letter "b":
    <br>
    <label for="b-word"></label>
    <input type="text" id="b-word" name="b-word" value="<?= $_POST["b-word"];?>">

    <br>
    <p id="b-error"><?= checkWord($_POST["b-word"], "b");?></p>
    <br>
    Enter a word that starts with the letter "c":
    <br>
    <label for="c-word"></label>
    <input type="text" id="c-word" name="c-word" value="<?= $_POST["c-word"];?>">
    <br>
    <p id="c-error"><?= checkWord($_POST["c-word"], "c");?></p>
    <br>
    <input type="submit" value="Submit Words">
</form>
<div>
    <h3>"a" is for: <?= $_POST["a-word"];?></h3>
    <h3>"b" is for: <?= $_POST["b-word"];?></h3>
    <h3>"c" is for: <?= $_POST["c-word"];?></h3>
    <div>

