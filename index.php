<?php
// Get username
$user = $_GET['u'];
 ?>
 <html>
 <head>
    <title>ChatBox</title>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="Javascript/Chat.js"></script>
</head>
<body>
<div class='chatContainer'>
  <div class='chatHeader'>
    <h3>Welcome <?php echo ucwords($user);?></h3>
  </div>
  <div class='chatMessages'>
    <?php
    // Getting messages
    $db = new PDO('mysql:host=localhost:8889;dbname=Chat', 'root', 'root');

    // Get messages
    $query = $db->prepare("SELECT * FROM messages");
    $query->execute();

    // Fetch
    while($fetch = $query->fetch(PDO::FETCH_ASSOC)){

      $name = $fetch['name'];
      $message = $fetch['message'];

      echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
    }
    ?>
  </div>
  <div class='chatBottom'>
    <form action='#' onSubmit='return false;' id='chatForm'>
      <input type='hidden' id='name' value='<?php echo $user; ?>'/>
      <input type='text' name='text' id='text'  value='' placeholder='type your chat message'/>
      <input type='submit' name='submit' value='Post'/>
    </form>
  </div>
</div>
</body>
</html>
