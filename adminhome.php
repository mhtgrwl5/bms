<?php
// if (isset($_SESSION['role'])) {
//   if ($_SESSION['role']!=1) {
//     header("LOCATION:home.php");
//   }
// }
 ?>
<?php include 'header.php'; ?>
<style media="screen">
  img{
    width:80%;
    height: 200px;
  }
</style>
<link rel="stylesheet" href="movie.css">
<a href="addcinema.php">
  <div class="lefta_d">
    <img src="cinema.jpg"><br>
    Add / Delete Cinema
  </div>
</a>
<a href="addshow.php">
  <div class="lefta_d">
    <img src="show.jpg" alt=""><br>
    Add / Delete Show
  </div>
</a>
<?php include 'footer.php'; ?>
