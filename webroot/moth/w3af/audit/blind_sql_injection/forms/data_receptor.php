<html>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />

	<?
		function errorHandler ($severity, $msg, $filename, $linenum)
		{

			#echo "error found" . $msg;

		}
		set_error_handler ("errorHandler");
	?>

	<i>
		Start--
	</i>
	<br/>
	<br/>

	<?
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "w3af_test");

		$result = mysqli_query($link, "SELECT * FROM users where name ='" . $_POST['user'] ."'");

    $row = $result->fetch_assoc();
    echo "<b>Name:</b> ".$row["name"]."<br>";
    echo "<b>Address:</b>  ".$row["address"]."<br>";
    echo "<b>Phone:</b> ".$row["phone"]."<br>";
    echo "<b>Email:</b> ".$row["email"]."<br>";

	?>

	<br/>
	<i>
		--End
	</i>

</html>
