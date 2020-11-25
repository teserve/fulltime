<?php
session_start();

include '../db_connection.php';

$id = $_SESSION['account_id'];

$answer1 = trim($_POST['answer1']) || NULL;
$answer2 = trim($_POST['answer2']) || NULL;
$answer3 = trim($_POST['answer3']) || NULL;
$answer4 = trim($_POST['answer4']) || NULL;
$answer5 = trim($_POST['answer5']) || NULL;
$answer6 = trim($_POST['answer6']) || NULL;
$answer7 = trim($_POST['answer7']) || NULL;
$answer8 = trim($_POST['answer8']) || NULL;
$answer9 = trim($_POST['answer9']) || NULL;
$answer10 = trim($_POST['answer10']) || NULL;

$answer_query = 'UPDATE g1116887.Survey_questions SET
answer1 = :answer1,
answer2 = :answer2,
answer3 = :answer3,
answer4 = :answer4,
answer5 = :answer5,
answer6 = :answer6,
answer7 = :answer7,
answer8 = :answer8,
answer9 = :answer9,
answer10 = :answer10
WHERE survey_id = :survey_id';

$answer_values = array(
  ':survey_id' => $_POST['hidden_survey_id'],
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

try
{
    $pdo->beginTransaction();

    $res = $pdo->prepare($question_query);
    $res->execute($question_values);

    $res1 = $pdo->prepare($answer_query);
    $res1 ->execute($answer_values);

    $pdo->commit();
}
catch (Exception $e)
{
    echo $e->getMessage();
}

// header('location: ./Survey/UserSurvey.php');
