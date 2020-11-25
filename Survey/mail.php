<?php
if(isset($_POST['submit'])){
    $to = $_POST['email'];
    $from = 'fulltime.inc.2020@gmail';
    $full_name = $_POST['full_name'];
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
    $subject2 = "Copy of Survey";
    $message = "
    <!DOCTYPE html>
    <!DOCTYPE html>
    <html lang="en">
    <form action="" method="post">
    Please answer the following questions :
    Question 1 : .$q1;
    Answer : <input type="text">
    Question 2 : .$q2;
    Answer : <input type="text">
    Question 3 : .$q3;
    Answer : <input type="text">
    Question 4 : .$q4;
    Answer : <input type="text">
    Question 5 : .$q5;
    Answer : <input type="text">
    Question 6 : .$q6;
    Answer : <input type="text">
    Question 7 : .$q7;
    Answer : <input type="text">
    Question 8 : .$q8;
    Answer : <input type="text">
    Question 9 : .$q9;
    Answer : <input type="text">
    Question 10 : .$q10;
    Answer : <input type="text">

    </form>

    </body>
    </html>


";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you ";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<html lang="en">
<form action="" method="post">
First Name: <input type="text" name="full_name" placeholder="Enter Recipient's Full Name"><br>
Email: <input type="text" name="email" placeholder="Enter Recipient's Email"><br>
Account type : <input type="text" placeholder="Student/Employer"><br>
Survey Frequency: <input type="text" placeholder="Enter Desired Survey Frequency"><br>
Question 1 : <input type="text" name="q1" placeholder="Enter Question"><br>
Question 2 : <input type="text" name="q2" placeholder="Enter Question"><br>
Question 3 : <input type="text" name="q3" placeholder="Enter Question"><br>
Question 1 : <input type="text" name="q1" placeholder="Enter Question"><br>
Question 2 : <input type="text" name="q2" placeholder="Enter Question"><br>
Question 3 : <input type="text" name="q3" placeholder="Enter Question"><br>
Question 4 : <input type="text" name="q4" placeholder="Enter Question"><br>
Question 5 : <input type="text" name="q5" placeholder="Enter Question"><br>
Question 6 : <input type="text" name="q6" placeholder="Enter Question"><br>
Question 7 : <input type="text" name="q7" placeholder="Enter Question"><br>
Question 8 : <input type="text" name="q8" placeholder="Enter Question"><br>
Question 9 : <input type="text" name="q9" placeholder="Enter Question"><br>
Question 10 : <input type="text" name="q10" placeholder="Enter Question"><br>

</form>

</body>
</html>
