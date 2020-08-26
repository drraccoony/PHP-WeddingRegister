<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Address Get</title>

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
      require_once("db_connect.php");
    ?>

    <div class="container">
      <h1>Gib Address!</h1>
      <p>Hello you! We (Vulan & Rico) need your address to send you an invitation to a very special event coming up in October. If you're not comfortable using this webpage, just telegram Rico or Vulan with your email or address.</p>
      <p>Please do not share this page. Fill this form out once for yourself. We are accounting for +1 invites and you'll be able to specifiy that on the actual invite, so please do not fill out this form multiple times.</p>
      <? if (isset($_COOKIE["WeddVisited"]))
      {
      ?>
      <div class="alert alert-danger" role="alert"><strong>Woah, Hold Up.</strong> I think you've already filled this out!<br><small>If you need to check, just poke <a href="http://telegram.me/drraccoon">Rico</a> on Telegram.</small></div>
      <? } ?>

      <form name="address-form" action="submit.php" method="post">

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Fur Name or Telegram Handle</label>
              <input type="text" class="form-control" name="furname" id="furname" placeholder="@wafflefox" required>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">Legal Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Jason Borune" required>
          </div>
        </div>
      </div>
      <div id="deliverymethod">
        <h4>How do you want your invite sent?</h4>
        <p>There is no right or wrong answer here. Email invites will be sent out shortly after mailed invites.</p>
        <button type="button" onclick="showmail()" class="btn btn-default"><i class="fas fa-shipping-fast"></i> Mail me one</button>
        <button type="button" onclick="showemail()" class="btn btn-default"><i class="fas fa-at"></i> Email me one</button>
      </div>
      <script>
        function showmail() {
          var x = document.getElementById("address");
          if (x.style.display === "none") {
            x.style.display = "block";
            deliverymethod.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }
        function showemail() {
          var x = document.getElementById("email");
          if (x.style.display === "none") {
            x.style.display = "block";
            deliverymethod.style.display = "none";
          } else {
            x.style.display = "none";
          }
        }
        function nevermind() {
            address.style.display = "none";
            email.style.display = "none";
            deliverymethod.style.display = "block";
        }
      </script>

      <div id="address" style="display:none;">
      <h4>Address</h4>
        <div class="form-group">
          <label for="exampleInputEmail1">Street Address</label>
          <input type="text" class="form-control" name="street1" id="street" placeholder="404 Bork St">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Street Address 2 (Optional)</label>
          <input type="text" class="form-control" name="street2" id="street2" placeholder="Apt 10">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">City</label>
              <input type="text" class="form-control" name="city" id="city" placeholder="Minneapolis">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">State</label>
              <input type="text" class="form-control" name="state" id="state" maxlength="2" placeholder="MN">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Zip</label>
          <input type="number" class="form-control" name="zip" id="zip" maxlength="10" placeholder="55004">
        </div>
        <button type="button" onclick="nevermind()" class="btn btn-link"><i class="fas fa-shipping-fast"></i> Change method</button>
        <button type="submit" class="btn btn-default">🦊 Submit!</button>
      </div>

      <div id="email" style="display:none;">
        <h4>Email</h4>
          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="fuzzytail@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
          </div>
          <button type="submit" class="btn btn-default">🦊 Submit!</button>
        </div>

        <script src="https://www.google.com/recaptcha/api.js?render=6LcAT-EUAAAAAJ_IvpXyoRiog3isVh5bA_0wxSzA"></script>
          <script>
          grecaptcha.ready(function() {
              grecaptcha.execute('REDACTED', {action: 'homepage'}).then(function(token) {
                 ...
              });
          });
          </script>



      </form>









    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
