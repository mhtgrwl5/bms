<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="movie.css">
  </head>
  <body style="background-image:url('b1.jpg')">
    <div class="loginbox" style="background-color:white;">
      <div class="contents lh50">
        Username <br>
        <input type="text" style="line-height:25px;width:98%;margin-left:3px;font-family:cursive" name="" value=""><br>
        Password <br>
        <input type="text" style="line-height:25px;width:98%;margin-left:3px;font-family:cursive;" name="" value=""><br>
        <div>
          <small>
            <small>
              Forgot Password
            </small>
          </small>
        </div>
        <div class="newdiv">
          <button type="button" name="button" class="lgnbtn" style="font-family:cursive;">Login</button>
          <button type="button" name="button" class="lgnbtn" style="font-family:cursive;">Register</button>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
