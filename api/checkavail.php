<?php
  $time = $_POST["time"];
  $date = $_POST["dte"];
  $cnn = mysqli_connect("127.0.0.1" , "root" , "password" , "bms");
  $qr = "SELECT book_id FROM book_id WHERE _time = '$time' AND _date = '$date'";
  $r = mysqli_query($cnn , $qr);
  $d="";
  while ($res = mysqli_fetch_assoc($r)) {
    $q = "SELECT * FROM book_seats WHERE book_id='$res[book_id]'";
    $ra = mysqli_query($cnn , $q);
    $res = mysqli_fetch_assoc($ra);
    $d .= ",#$res[seat_no]";
    while($res = mysqli_fetch_assoc($r)){
      $d .=",#$res[seat_no]";
    }
  }
  echo "$d";
?>
