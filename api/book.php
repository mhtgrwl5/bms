<?php
  $time = $_POST["time"];
  $date = $_POST["dte"];
  $seats = explode(",",$_POST["seats"]);
  $cnn = mysqli_connect("127.0.0.1" , "root" , "password" , "bms");
  $qr = "INSERT INTO book_id (`book_id` , `_time` , `_date`) VALUES (NULL , '$time' , '$date')";
  $r = mysqli_query($cnn,$qr);
  echo "$qr<br>";
  if ($r) {
    $q = "SELECT MAX(book_id) FROM book_id";
    $r = mysqli_query($cnn,$q);
    $res = mysqli_fetch_row($r);
    $b_id = $res[0];
    $qr = "INSERT INTO book_seats (`seat_id` , `book_id` , `seat_no`) VALUES (NULL , '$b_id' , '$seats[0]')";
    for ($i=1; isset($seats[$i]); $i++) {
      $qr .= ",(NULL , '$b_id' , '$seats[$i]')";
    }
    echo "$qr<br>";
    $r = mysqli_query($cnn , $qr);
    if ($r) {
      echo "SUCCESSFULLY BOOKED";
    } else {
      echo "UNEXPECTED ERROR OCCURED";
    }
  } else {
    echo "FAILED TO ESTABLISH CONNECTION";
  }
?>
