<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php

$nameErr =$anioErr = $mesErr = $diaErr = $emailErr = $genderErr = $websiteErr = $DNIErr = $EdadErr ="";
$name = $anio = $mes = $dia = $email = $gender = $comment = $website  = $Edad = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
$nameErr = "Name is required";
} else {
$name = test_input($_POST["name"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameErr = "Only letters and white space allowed";
}
}
if (empty($_POST["email"])) {
$emailErr = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
}
}

if (empty($_POST["gender"])) {
$genderErr = "Gender is required";
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
<h2>VENTA DE PASAJES AEREOS</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<p>
NOMBRE:
<input type="text" name="name" value="<?php echo $name;?>" />
<span class="error">
* <?php echo $nameErr;?>
</span>
<br />
<br />DNI:
<input type="text" name="DNI" value="<?php echo $DNI;?>" />
<span class="error">  * <?php echo $DNIErr;?>
</span>
<br />
<br />
FECHA DE NACIMIENTO:
<br />
DIA:
<input type="text" name="dia" value="<?php echo $dia;?>" />
<span class="error">
* <?php echo $diaErr;?>
</span>
MES:
<input type="text" name="mes" value="<?php echo $mes;?>" />
<span class="error">
* <?php echo $mesErr;?>
</span>
AÑO:
<input type="text" name="anio" value="<?php echo $anio ;?>" />
<span class="error">
* <?php echo $anioErr;?>
</span>
<br />
<br />
Genero:
<input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="Femenino")
              echo "checked";?> value="female" />Female
<input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="Masculino")
              echo "checked";?> value="male" />Male
<span class="error">
    * <?php echo $genderErr;?>
</span>
<br />
<br />
<input type="submit" name="submit" value="Confirmar" />
<form>
<?php
echo "<h2>RESULTADO:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $DNI;
echo "<br>";
echo $gender;
echo "<br>";
echo $anio;
echo "<br>";
echo "Usted es adulto"
?>;
<body>
<html>