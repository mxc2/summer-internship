<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>A basic form</title>
    <meta name="description" content="A basic form">
    <meta name="author" content="Ludwig Stumpp">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="scripts.js"></script>
  </head>

 <body>
  <form id="my-form" onsubmit="return false">
    <label for="firstname">Firstname:</label><br>
    <input id="firstname" type="text" name="user_firstname" placeholder="John" required><br>
    <label for="lastname">Lastname:</label><br>
    <input id="lastname" type="text" name="user_lastname" placeholder="Doe" required><br>
    <input class="submit-button" type="submit" value="Submit">
    <div id="lock-modal"></div>
    <div id="loading-circle"></div>
  </form>
</body>

</html>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #188BE2;
}

form {
  margin: auto;
  width: 200px;
  background-color: white;
  border-radius: 4px;
  margin-top: 40px;
  padding: 20px;
  position: relative;
}

form input {
  margin-top: 5px;
  margin-bottom: 20px;
  border: none;
  border-bottom: 1px gray solid;
}

form input:last-of-type {
  margin-bottom: 0;
}

form input:focus {
  border-bottom: 1px solid #188BE2;
}

form .submit-button {
  border: none;
  background-color: #14A4E7;
  padding: 4px;
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 3px;
  cursor: pointer;
  height: 30px;
}

.submit-button:hover {
  background-color: #54A1F4;
}


#lock-modal {
  display: none;
  background-color: black;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: inherit;
}

#loading-circle {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 40px;
  height: 40px;
  border: 4px solid #f3f3f3;
  border-top: 4px solid #3498db;
  border-radius: 50%;
  animation: spin 0.6s ease-in infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
</style>