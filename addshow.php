<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="movie.css">
  </head>
  <style media="screen">
    .mhtmodal .boxes{
      line-height: 27px;
      font-size: 24px;
      padding: 4px;
      width: 90%;
      font-family: serif;
      margin: auto;
    }
  </style>
  <body>
    <?php include 'header.php'; ?>
    <div class="mhtmodal">
      <div class="mhead">
        Add show / movie
      </div>
      <select class="boxes" name="">
        <option value="">Select theater</option>
      </select><br><br>
      <input type="text" class="boxes" placeholder="Enter show name" name="" value=""><br><br>
      <input type="date" class="boxes"><br><br>
      <input type="file" placeholder="Upload Poster" class="boxes"><br><br>
      <input type="number" min="1" max="7" placeholder="Enter number of shows" class="boxes" style="width:70%">
      <button type="button" class="boxes" style="width:20%;" name="button">Proceed</button>
      <div class="showtiming" style="width:93%;">

      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
