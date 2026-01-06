<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

          
<form method="post" id="contact-form">
  <input name="name" placeholder="Your name" required />
  <input name="email" placeholder="Email or WhatsApp" required />
  <input name="subject" placeholder="Subject" />
  <textarea name="message" rows="5" placeholder="Message"></textarea>
  <button type="submit" name="send" class="primary">Send</button>
</form>
           
</body>
</html>


 <?php
 if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
           

            echo"usere name =". $name."<br>";
            echo "user email=".$email."<br>";
            echo "user subject=".$subject."<br>";
            echo "user message=".$message."<br>";

           
 }
           
            
            ?>

    