<?php
include('includes/config.php');
if(isset($_POST['view'])){
if($_POST["view"] != '')
{
   $update_query = "UPDATE comments SET comment_status = 1 WHERE comment_status=0";
   $queryStatus = $dbh -> prepare($update_query);
	$queryStatus->execute();	
}
$queryFetch = "SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5";

$query = $dbh -> prepare($queryFetch);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$output = '';

		if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{
		  $output .= '
  <li>
  <a href="#">
  <strong>'.$result->comment_subject.'</strong><br />
  <small><em>'.$result->comment_text.'</em></small>
  </a>
  </li>
  ';
}
										}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM comments WHERE comment_status=0";
$result_query = $dbh -> prepare($status_query);
$result_query->execute();
$result_query = $dbh -> prepare("SELECT FOUND_ROWS()");
$result_query->execute();
$count = $result_query->fetchColumn();
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>