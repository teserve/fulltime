<!--gets input from html page to be pasted to email-->
<?php
if(isset($_POST['submit'])){
    $from = "fulltime.inc.2020@gmail.com"; // this is Fulltime's address
    $to = $_POST['email']; // this is the recipient's email address
    $full_name = $_POST['full_name'];  // this is the recipient's full name
    //user-inputted questions
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];
    $subject = "Survey";
    //email content
    $message = " Copy the following questions and fill it out. Send your answers to our email fulltime.inc.2020@gmail.com \n
      Survey Questions\n
        Question 1 :" .$q1. "\n
        Answer : \n
        Question 2 :" .$q2. "\n
        Answer : \n
        Question 3 :" .$q3. "\n
        Answer : \n
        Question 4 :" .$q4. "\n
        Answer : \n
        Question 5 :" .$q5. "\n
        Answer : \n
        Question 6 :" .$q7. "\n
        Answer : \n
        Question 7 :" .$q7. "\n
        Answer : \n
        Question 8 :" .$q8. "\n
        Answer : \n
        Question 9 :" .$q9. "\n
        Answer : \n
        Question 10 :" .$q10. "\n
        Answer : \n ";
    //email header
    $headers = "From:" . $from;
    //send email
    mail($to,$subject,$message,$headers);
    //echo confirmation
    echo "Email Sent. Thank you ";

    }
?>
<!-- Begins HTML -->
<!DOCTYPE html>
<!-- HTML header -->
<head>
<title>Admin Survey</title>
<style>
body {
  background-image: url('../fulltime.jpg');
  background-color: rgba(255, 255, 255, 0.486);
  background-blend-mode: overlay;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
</head>
<!-- Main Content -->
<body>
<a href="../Analytics/AdminSurvey.php"><button type="button">Back to Analytics</button></a>
<!-- collects recipient's informations and survey questions -->
<form action="" method="post">
  <h1> Survey Questions </h1>
  <p>Full Name: <input type="text" name="full_name" placeholder="Enter Recipient's Full Name" size="50"></p>
  <p>Email: <input type="text" name="email" placeholder="Enter Recipient's Email" size="50"></p>
  <p>Account type : <input type="text" placeholder="Student/Employer" size="20"></p>
  <p>Survey Frequency: <input type="text" placeholder="Enter Desired Survey Frequency" size="50"></p>
  <p>Question 1 :<br> <textarea rows="5" name="q1" cols="100"></textarea></p>
  <p>Question 2 :<br> <textarea rows="5" name="q2" cols="100"></textarea></p>
  <p>Question 3 :<br> <textarea rows="5" name="q3" cols="100"></textarea></p>
  <p>Question 4 :<br> <textarea rows="5" name="q4" cols="100"></textarea></p>
  <p>Question 5 :<br> <textarea rows="5" name="q5" cols="100"></textarea></p>
  <p>Question 6 :<br> <textarea rows="5" name="q6" cols="100"></textarea></p>
  <p>Question 7 :<br> <textarea rows="5" name="q7" cols="100"></textarea></p>
  <p>Question 8 :<br> <textarea rows="5" name="q8" cols="100"></textarea></p>
  <p>Question 9 :<br> <textarea rows="5" name="q9" cols="100"></textarea></p>
  <p>Question 10 :<br> <textarea rows="5" name="q10" cols="100"></textarea></p>
  <input type="submit" name="submit" value="Submit" onsubmit="alert('Email sent successfully.');">
</form>
</body>
</html>
