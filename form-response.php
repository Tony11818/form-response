<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Tony's FORM!</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $ageErr = $genderErr = $websiteErr = "";
$name = $age = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
        $error = true;
  } else if (strlen($_POST["name"] > 30)) {
                $nameErr = "Why such a long name?";
                $error = true;
        } else {
        $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["age"])) {
    $ageErr = "Number is required";
        $error = true;
  } else {
    $age = test_input($_POST["age"]);
    // check if e-mail address is well-formed
    if (!filter_var($age, FILTER_VALIDATE_INT)){
      $ageErr = "Invalid age format";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
        $error = true;
  } else {
   $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
        if ($_POST["submit"] && !$error){
                echo "<h2>Your Input:</h2>";
                if (strtolower($_POST["name"]) == "tony") {
                        echo "Hey there " . $name . ", you sexy beast!";
                } else {
                        echo "Hey there " . trim($name) . "!";
                }
                echo "<br><br>";
                echo "Your age is " . $age . ".";
                echo "<br><br>";
                 $number = 1;

                while ($number <= $age) {
                        echo $number . " ";

                        $number++;
                }
                echo "<br><br>";
                echo "You identify as " . $gender . ":";
                echo "<br>";

                switch($gender)
                {
                        case "male":
                                echo '<a href="https://en.wikipedia.org/wiki/Male">
                Males should check out this wikipedia!</a>';
                                break;
                        case "female":
                                echo '<a href="https://en.wikipedia.org/wiki/Female">
                Females Should check out this article! (suggestion not a demand)</a>';
                 break;
                        default:
                                echo '<a href="https://en.wikipedia.org/wiki/Female"> Females Should check out this article! (suggestion not a demand)</a> <br> <a href="https://en.wikipedia.org/wiki/Male"> Males should check out this wikipedia!</a>';
                                break;
                }
        } else {
                include("form.php");
        }
        echo "<br><br>";
        echo date("l, F j, o");
?>
        <br><br>
        <div id="validator">
                <a href="http://validator.w3.org/nu/?doc=https://nbtl.mesacc.edu/anthony1/php/form-response.php">
                HTML 5 Validation</a>
        </div>

</body>
</html>
