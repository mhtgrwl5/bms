<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>


    <div id="SUCCESS"></div>
    <div class="t">
    <table border=0 width="620px">
      <tr>
        <td style="color:lightgrey;">Date</td>
        <td> <select style="width:100%" class="date">
            <option value="">SELECT DATE</option>
          <?php $d=date("d");
            for ( $i=0; $i < 5; $i++) {
              $x=$d+$i;
              echo "<option>$x/".date("m/Y")."</option>";
            }
           ?>
        </select> </td>
        <td style="color:lightgrey;">Time</td>
        <td> <select style="width:100%" class="time">
          <option value="">SELECT TIME</option>
          <option value="07:00:00">07:00:00</option>
          <option value="10:00:00">10:00:00</option>
          <option value="14:00:00">14:00:00</option>
          <option value="17:00:00">17:00:00</option>
          <option value="20:00:00">20:00:00</option>
        </select> </td>
      </tr>
    </table>
    <table border=0 width="630px">
      <tr>
        <td style="color:lightgrey;">Number of Seats</td>
        <td><input id="seats" style="color:grey;border-color: lightgrey;border-width: 1px;width:95%" type="number" value="0"></td>
      </tr>
    </table>
      <div class="rowshow">
        <?php
        $z='A';
        for ($i=1; $i <= 14; $i++) {
        echo"<div class='mnrow'>".
        $z++.
        "</div>";}
        ?>
      </div>
      <div class="l">
    <?php
    $z='A';
    $z--;
    for ($j=1; $j <= 14; $j++){
    for ($i=1; $i <= 10; $i++) {
    echo"<div id='$z$i' class='seat'>
      $i
    </div>";}
      $z++;}
    ?></div>
    <div class="r">
      <?php
      $z='A';
      $z--;
      for ($j=1; $j <= 14; $j++){
      for ($i=11; $i <= 20; $i++) {
      echo"<div id='$z$i' class='seat'>
        $i
      </div>";}
        $z++;}
      ?>
    </div>
    </div>

  <button type="button" id="book" name="button">Book Tickets</button>
  <div class="green">
    <div class="white"></div>
    <div class="red"></div>
  </div>
  <div class="error"></div>
  <script src="jquery-3.3.1.js" charset="utf-8"></script>
  <script type="text/javascript">
    function check() {
      var dt = $(".date").val();
      var time = $(".time").val();
      if (dt!="" && time!="") {
        var dt = new Date(Date.now());
        var date = dt.getDate();
        var ar = $(".date").val().split("/");
        if (ar[0]==date) {
          var time = $(".time").val().split(":");
          var a = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
          var crnttime = a.split(":");
          if (parseInt(time[0]) <= parseInt(crnttime[0])) {
            $('.time option:first').prop('selected',true);
            $('.date option:first').prop('selected',true);
            $(".date").val("");
            $(".time").val("");
            alert("Show Time has already passed");
            return 0;
          }else {
            return 1;
          }
        } else {
          return 1;
        }
      }
    }
    function arrayToList(s) {
      return s.toString();
    }
    function getBooked() {
      var dt = $(".date").val();
      var time = $(".time").val();
      var dsplit = dt.split("/");
      dt = dsplit[2]+"/"+dsplit[1]+"/"+dsplit[0];
      $.post("api/checkavail.php",{ dte:dt , time:time },function(dat){
        var a = dat.split(",");
        for (var i = 0; i < a.length; i++) {
          $(a[i]).css("background-color",$(".red").css("background-color"));
          $(a[i]).css("color",$(".white").css("background-color"));
        }
      });
    }
    $(document).ready(function(){
      var now = new Date(Date.now());
      var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
      var tot = 280;
      var avail = 280;
      var max = 0;
      var count = 0;
      var ar = [];
      var j = 0;
      $(".time").change(function(){
        $(".seat").each(function(){
          var x="#"+this.id;
          $(x).css("background-color",$(".white").css("background-color"));
          $(x).css("color",$(".mnrow").css("color"));
        });
        count = 0;
        var dt = $(".date").val();
        var time = $(".time").val();
        if(check() && dt!="" && time!=""){
         getBooked();
        }
      });
      $(".date").change(function(){
        var dt = $(".date").val();
        var time = $(".time").val();
        if(check() && dt!="" && time!="")
         getBooked();
      });
      $("#book").click(function(){
        if(check()){
        $(".seat").each(function(i){
            if ($(this).css("background-color")==$(".green").css("background-color")) {
              ar.push(this.id);
            }
        });
        var dt = $(".date").val();
        var time = $(".time").val();
        if( dt!="" && time!=""){
          var dsplit = dt.split("/");
          dt = dsplit[2]+"/"+dsplit[1]+"/"+dsplit[0];
          var a = arrayToList(ar);
          $.post("api/book.php",{ seats:a , dte:dt , time:time },function(dat){
            $("#SUCCESS").html(dat);
            $("#SUCCESS").show();
            $("#SUCCESS").fadeOut(3000);
          });
        }else {
          alert("Check show date and time");
        }
      } else {
        alert("Check show date and time");
      }
      });
      $("#seats").on("change keypress",function(){
        max = $(this).val();
        $(".seat").each(function(){
          var x="#"+this.id;
          $(x).css("background-color",$(".white").css("background-color"));
          $(x).css("color",$(".mnrow").css("color"));
        });
        getBooked();
        count = 0;
      });
      $(".seat").click(function(){
        var i = this.id;
        var bac = $(this).css("background-color");
        if (bac==$(".white").css("background-color")) {
          if (count>=max) {
            $(".error").show();
            $(".error").html("You have already selected max no. of seats.");
            $(".error").fadeOut(2000);
          } else {
            count++;
            $(this).css("background-color",$(".green").css("background-color"));
          }
        } else if (bac==$(".green").css("background-color")) {
          $(this).css("background-color",$(".white").css("background-color"));
          count--;
        }
      });
    });
  </script>
  </body>
</html>
