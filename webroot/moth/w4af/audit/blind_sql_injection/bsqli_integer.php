<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />

<?

function errorHandler( $severity, $msg, $filename, $linenum){

# echo "error found" . $msg;

}

set_error_handler("errorHandler");

$link = mysqli_connect("localhost", "root" , "");

mysqli_select_db($link, "w4af_test");

$result = mysqli_query($link, "SELECT * FROM users where id =" . $_GET['id']);

$row = $result->fetch_assoc();
if ($row != false) {
echo "<b>Name:</b> ".$row["name"]."<br>";
echo "<b>Address:</b>  ".$row["address"]."<br>";
echo "<b>Phone:</b> ".$row["phone"]."<br>";
echo "<b>Email:</b> ".$row["email"]."<br>";
}

?>
