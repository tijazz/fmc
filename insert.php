<?php
if(isset($_POST["subject"]))
{
include('includes/config.php');	//include("connect.php");
$subject = $dbh->quote($subject); //$subject = mysqli_real_escape_string($con, $_POST["subject"]);
$comment = $dbh->quote($comment); //$comment = mysqli_real_escape_string($con, $_POST["comment"]);
$query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
$dbh->prepare($query);	//mysqli_query($con, $query);
}
?>
