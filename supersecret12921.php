<?php
  require_once("db_connect.php");
?>
<h1>Gib Address!</h1>
<p>Hello you! We (Vulan & Rico) need your address to send you an invitation to a very special event coming up in October. If you're not comfortable using this webpage, just telegram Rico or Vulan with your email or address.</p>
<p>Please do not share this page. Fill this form out once for yourself & your partner.</p>
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
