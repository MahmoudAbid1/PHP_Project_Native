<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    <style>
      form {
        width: 300px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
    <form action="send.php" method="post">
      <h2>Forgot Password</h2>
      <p>Enter your email address to reset your password:</p>
      <input type="email" name="email"placeholder="Email" required>
      <button type="submit" name="submit">Send Email</button>
    </form>
  </body>
</html>












<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="send.php" method="post">
        <input type="email" placeholder="email" name="email">
        <button type="submit" name="submit">Send Email</button>
    </form>
</body>
</html> -->