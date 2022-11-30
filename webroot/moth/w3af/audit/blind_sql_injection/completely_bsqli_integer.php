<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />

<?


function errorHandler( $severity, $msg, $filename, $linenum){

#echo "error found" . $msg;

}

set_error_handler("errorHandler");

$link = mysqli_connect("localhost", "root" , "");

mysqli_select_db($link, "w3af_test");

$result = mysqli_query($link, "SELECT * FROM users where id =" . $_GET['id']);

echo "<i>don't get fooled by the 'static' response, the id parameter <b>is</b> injectable</i>";

?>
