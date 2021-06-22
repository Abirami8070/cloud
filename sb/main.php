<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login </h2>

 
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" style="width:310px;height:300px;"class="avatar">
  </div>

  <h1> Choose your login</h1>

  <form action="login.php">
  <p>Please select your gender:</p>
  <input type="radio" id="male" name="gender" value="Producer">
  <label for="male">Producer</label>
  <br><br>
  <input type="submit" value="Submit">
  </form>
  <br>  
  <form action="../cms/login.php">
  <input type="radio" id="male" name="gender" value="retailer">
  <label for="male">retailer</label><br>
   
   <br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
