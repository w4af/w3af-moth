<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />

<? 

function generateRnd($length = 8){

  // start with a blank password
  $password = "";

  // define possible characters
  $possible = "0123456789bcdfghjkmnpqrstvwxyz";

  // set up a counter
  $i = 0;

  // add random characters to $password until $length is reached
  while ($i < $length){

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand (0, strlen ($possible) - 1), 1);

      // we don't want this character if it's already in the password
      if (!strstr ($password, $char))
	{
	  $password .= $char;
	  $i++;
	}
  }

  // done!
  return $password;

}

function errorHandler ($severity, $msg, $filename, $linenum)
{

  if ($_GET['debug'])
    {
      echo $msg."<br/>";
    }

}

set_error_handler ("errorHandler");

$link = mysqli_connect ("localhost", "root", "");

mysqli_select_db ($link, "w4af_test");

if ($_GET['debug'])
  {
    echo "SELECT * FROM users where email ='".$_GET['email']."'";
    echo "<br>";
  }

$result = mysqli_query ($link, "SELECT * FROM users where email ='".$_GET['email']."'");

echo generateRnd() . "<br>";

$row = $result->fetch_assoc();
echo "<b>Name:</b> ".$row["name"]."<br>";
echo "<b>Address:</b>  ".$row["address"]."<br>";
echo "<b>Phone:</b> ".$row["phone"]."<br>";
echo "<b>Email:</b> ".$row["email"]."<br>";

echo generateRnd() . "<br>";

?>
