<!DOCTYPE=HTML>
<html><title>Haystack Order Form</title><body style="background-color:black; color:white;">
<h1>HW05</h1>
<?php $un="";$em = $un . "@southern.edu";$pass="";$phone="000-000-0000";$salsa="";$onion="";
$bean="";$chip="";$cream="";$toppings[]="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["un"])) {
    echo "<p style=\"color:red\">Username is required<p>";
  } else {
    $un = test_input($_POST["un"]);
  }
  if (empty($_POST["pass"])) {
    echo "<p style=\"color:red\">Password is required</p>";
  } else {
    $pass = test_input($_POST["pass"]);
    }
  if (empty($_POST["phone"])) {
    echo "<p style=\"color:red\">Cell Phone is required</p>";
  } else {
    $phone = test_input($_POST["phone"]);      }
    if (empty($_POST["onion"])) {
      echo  "<p style=\"color:red\">Onion selection is required</p>";
    } else {
      $onion = test_input($_POST["onion"]);
    }
    if (empty($_POST["salsa"])) {
      echo "<p style=\"color:red\">Salsa selection is required</p>";
    } else {
      $salsa = test_input($_POST["salsa"]);
    }
    if (empty($_POST["cream"])) {
      echo  "<p style=\"color:red\">Sour Cream selection is required</p>";
    } else {
      $cream = test_input($_POST["cream"]);
    }
    if (empty($_POST["bean"])) {
      echo "<p style=\"color:red\">Beans selection is required</p>";
    } else {
      $bean = test_input($_POST["bean"]);
    }
    if (empty($_POST["chip"])) {
     echo "<p style=\"color:red\">Chips selection is required</p>";
    } else {
      $chip = test_input($_POST["chip"]);
    }
  }
  function sendMail($target,$subject,$message,$from){

  if( mail($target,$subject,$message,"From: " . $from)) {
    print "Successful";
  } else {
    print "Unsuccessful";
  }

  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Username*:    <input type="text" name="un" value="<?php echo $un;?>"> @southern.edu<br>
Password*:    <input type="password" name="pass" value="<?php echo $pass;?>"><br>
Cell Phone*:  <input type="text" name="phone" value="<?php echo $phone;?>"><br>
Chips*:
<select name="chip">
  <option value="">Please Select</option>
  <option value="None">None</option>
  <option value="White Doritos">White Doritos  </option>
  <option value="Yellow Fritos">Yellow Fritos</option>
  <option value="Rice">Rice </option>
</select> <br>

<?php
switch($_POST["chip"])
{
case "None": $chip = "None"; break;
case "White Doritos": $chip = "White Doritos"; break;
case "Yellow Fritos": $chip = "Yellow Fritos"; break;
case "Rice": $chip = "Rice"; break;
default: echo("Error!");}
?>

Salsa <input type="radio" name="salsa"
<?php if (isset($salsa) && $salsa=="No") echo "checked";?>
value="no">No
<input type="radio" name="salsa"
<?php if (isset($salsa) && $salsa=="Mild") echo "checked";?>
value="mild">Mild
<input type="radio" name="salsa"
<?php if (isset($salsa) && $salsa=="Hot") echo "checked";?>
value="hot">Hot<br>
Onion <input type="radio" name="onion"
<?php if (isset($onion) && $onion=="No") echo "checked";?>
value="no">No
<input type="radio" name="onion"
<?php if (isset($onion) && $onion=="White") echo "checked";?>
value="white">White
<input type="radio" name="onion"
<?php if (isset($onion) && $onion=="Green") echo "checked";?>
value="green">Green<br>

Beans <input type="radio" name="bean"
<?php if (isset($bean) && $bean=="No") echo "checked";?>
value="No">No
<input type="radio" name="bean"
<?php if (isset($bean) && $bean=="Black Beans") echo "checked";?>
value="Black Beans">Black Beans<br>

Sour Cream <input type="radio" name="cream"
<?php if (isset($cream) && $cream=="No") echo "checked";?>
value="no">No
<input type="radio" name="cream"
<?php if (isset($cream) && $cream=="Vegan") echo "checked";?>
value="Vegan">Vegan<br>

    Diced Tomatoes <input type="checkbox" name="toppings[]" value="Tomatoes"><br>
    Shreddred Cheese <input type="checkbox" name="toppings[]" value="Cheese"><br>
    Chopped Lettuce <input type="checkbox" name="toppings[]" value="Lettuce"><br>
    Sliced Olives <input type="checkbox" name="toppings[]" value="Olives"><br>
    Bacos <input type="checkbox" name="toppings[]" value="Bacos"><br>

<br><input type="submit" name="submit" value="Validate Form">
<?php if(!empty($_POST["un"])){
 echo "<input type=\"button\" name=\"transmit\" value=\"Transmit\"><br>";}
?>
</form>
<?php
echo "--Report--<br>";
if(!empty($_POST["un"])){echo "User: " . $un; echo "<br>";}
if(!empty($_POST["phone"])){if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$phone)||preg_match("/^[0-9]{3}-[0-9]{4}$/",$phone)){echo "Phone number: " . $phone; echo "<br>";}else{echo "Phone number is invalid<br>";}}
echo "Beans: " . $bean; echo "<br>";
echo "Sour Cream: " . $cream; echo "<br>";
echo "Salsa: " . $salsa; echo "<br>";
echo "Onions: " . $onion; echo "<br>";
echo "Chips: " . $chip . "<br>";
if(!empty($_POST["toppings"])){
  foreach($_POST["toppings"]as $toppings){
    echo $toppings."<br>";
  }
}
?>
</body></html>
