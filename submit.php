<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Address Get - Thanks!</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0528c2bae4.js" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
      {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
      }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
      {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    else
      {
        $ip_address = $_SERVER['REMOTE_ADDR'];
      }


      $var_form_debug = $_POST['debug'];
      $var_form_furname = $_POST['furname'];
      $var_form_name = $_POST['name'];
      $var_form_email = $_POST['email'];
      $var_form_street1 = $_POST['street1'];
      $var_form_street2 = $_POST['street2'];
      $var_form_city = $_POST['city'];
      $var_form_state= $_POST['state'];
      $var_form_zip = $_POST['zip'];

      if (empty($var_form_name))
      {
        /*echo 'fuk!';*/
        /*header("Location: /index.php");*/
      }else{
      setcookie("WeddVisited", $var_form_furname, time()+13600);
      $var_form_token = rand(100000, 999999);
      require_once("db_connect.php");
      if (!$conn)
        {
        die('Could not connect: ' . mysql_error());
        }
      $sql="INSERT INTO addresses (furname, name, email, street1, street2, city, state, zip, ip, token)
      VALUES
      ('$var_form_furname','$var_form_name','$var_form_email','$var_form_street1','$var_form_street2','$var_form_city','$var_form_state','$var_form_zip','$ip_address','$var_form_token')";

      if (!$conn->query($sql) === TRUE)
        {
        die('Error: ' . mysql_error());
      }
      $conn->close();
    }

    $apiToken = "1119506651:AAHFPcOMPlc1c8AfgKLCz7mwm8QuuJzgW8M";
    $data = [
        'chat_id' => '-1001473787560',
        'text' => 'Ping! ' . $var_form_furname . ' (' . $var_form_name . ') just requested a wedding invite online.'
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

      ?>

    <div class="container">
      <? if (empty($var_form_name)){ ?>
        <h1 class="text-danger"><i class="fad fa-exclamation-circle"></i> Something went wrong</h1>
        <p>How did you even get here? Apparently we didn't get the form contently properly. Please go back and give it a shot again.</p>
        <p><strong>Error:</strong> <tt>var_form_name</tt> returned empty.</p>
        <a href="index.php">Try again</a>

      <? } else { ?>
      <h1 class="text-success"><i class="fad fa-check-circle"></i> Great! We got it</h1>
      <p>Thanks <u><? echo $var_form_furname;?></u>. We'll shoot you an invite soon via your preferred method!</p>

      <? if (!empty($var_form_email)) { ?>
      <h3>Email captured</h3>
      <p>If this is wrong, please <a href="http://telegram.me/drraccoon">telegram message me</a>. Do not submit another form.</p>
      <blockquote><? echo $var_form_email;?></blockquote>
      <p>If you're a local to the Minneapolis area, odds are we may just hand deliver you an invite.</p>
    <? } ?>


      <? if (!empty($var_form_street1)) { ?>
      <h3>Address captured</h3>
      <p>If this is wrong, please <a href="http://telegram.me/drraccoon">telegram message me</a>. Do not submit another form.</p>
      <blockquote><? echo $var_form_name;?><br><? echo $var_form_street1;?><br><? echo $var_form_city;?>, <? echo $var_form_state;?> <? echo $var_form_zip; ?></blockquote>
      <p>If you're a local to the Minneapolis area, odds are we may just hand deliver you an invite.</p>
    <? } ?>
      <hr>
      <p>You dont need to save this. Your token is <kbd><? echo $var_form_token; ?></kbd>.</p>
    <? } ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
