<?php
session_start();

require 'db_connection.php';

$id = $_SESSION['account_id'];

$get_name = trim($_POST['get_name']);
$get_email = trim($_POST['get_email']);
$type = trim($_POST['input-type']);
$freq = trim($_POST['input-freq']);


$question1 = trim($_POST['question1']);
$question2 = trim($_POST['question2']);
$question3 = trim($_POST['question3']);
$question4 = trim($_POST['question4']);
$question5 = trim($_POST['question5']);
$question6 = trim($_POST['question6']);
$question7 = trim($_POST['question7']);
$question8 = trim($_POST['question8']);
$question9 = trim($_POST['question9']);
$question10 = trim($_POST['question10']);

$answer1 = trim($_POST['answer1']);
$answer2 = trim($_POST['answer2']);
$answer3 = trim($_POST['answer3']);
$answer4 = trim($_POST['answer4']);
$answer5 = trim($_POST['answer5']);
$answer6 = trim($_POST['answer6']);
$answer7 = trim($_POST['answer7']);
$answer8 = trim($_POST['answer8']);
$answer9 = trim($_POST['answer9']);
$answer10 = trim($_POST['answer10']);

$survey_query = 'INSERT INTO g1116887.Survey SET
get_name = :get_name,
get_email = :get_email,
type = :type,
freq = :freq';

$survey_values = array(
  ':get_name' => $get_name,
  ':get_email' => $get_email,
  ':type' => $type,
  ':freq' => $freq
);

$question_query = 'INSERT INTO g1116887.Survey_questions SET
survey_id = :survey_id,
question1 = :question1,
question2 = :question2,
question3 = :question3,
question4 = :question4,
question5 = :question5,
question6 = :question6,
question7 = :question7,
question8 = :question8,
question9 = :question9,
question10 = :question10';


$answer_query = 'INSERT INTO g1116887.Survey_questions SET
  survey_id = :survey_id,
  answer1 = :answer1,
  answer2 = :answer2,
  answer3 = :answer3,
  answer4 = :answer4,
  answer5 = :answer5,
  answer6 = :answer6,
  answer7 = :answer7,
  answer8 = :answer8,
  answer9 = :answer9,
  answer10 = :answer10';



try
{
    $pdo->beginTransaction();

    $res = $pdo->prepare($survey_query);
    $res->execute($survey_values);

    $question_values = array(
      ':survey_id' => $pdo->lastInsertId(),
      ':question1' => $question1,
      ':question2' => $question2,
      ':question3' => $question3,
      ':question4' => $question4,
      ':question5' => $question5,
      ':question6' => $question6,
      ':question7' => $question7,
      ':question8' => $question8,
      ':question9' => $question9,
      ':question10' => $question10,
    );

    $answer_values = array(
      ':survey_id' => $survey_id,
      ':answer1' => $answer1,
      ':answer2' => $answer2,
      ':answer3' => $answer3,
      ':answer4' => $answer4,
      ':answer5' => $answer5,
      ':answer6' => $answer6,
      ':answer7' => $answer7,
      ':answer8' => $answer8,
      ':answer9' => $answer9,
      ':answer10' => $answer10,
    );
    $res1 = $pdo->prepare($question_query);
    $res1->execute($question_values);

    $res2 = $pdo->prepare($answer_query);
    $res2->execute($answer_values);

    $pdo->commit();
}
catch (Exception $e)
{
    echo $e->getMessage();
}

header('location: ./Survey/UserSurvey.php');
