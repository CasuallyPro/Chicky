<?php
// Getting messages
$db = new PDO('mysql:host=localhost:8889;dbname=Chat', 'root', 'root');

// Get messages
$query = $db->prepare("SELECT * FROM messages");
$query->exec();

// Fetch
while($fetch = $query->fetch(PDO::FETCH_ASSOC)){

  $name = $fetch['name'];
  $message = $fetch['message'];

  echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
}
?>
