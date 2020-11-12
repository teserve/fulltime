<?php 

include 'enter_review.php';
include 'db_connection.php';

public function insert_review($company, $industry, $e_type, $rating, $review)
{

    global $pdo;

    $company = trim($company);
    $industry = trim($industry);
    $i_type = trim($e_type);
    $rating = trim($rating);


    $review_query = 'INSERT INTO g1116887.Reviews (company, industry, e_type, rating, review, creat_time) VALUES (:company, :industry, :etype, :rating, :review, CURDATE())';

    $main_values = array(':company' => $company,':industry' => $industry, 'e_type' => $e_type, ':rating' => $rating, ':review' => $review);

    try{
    
        $pdo->beginTransaction();

        $res1 = $pdo->prepare($review_query);
        $res1->execute($main_values);

        $pdo->commit();
    }

    catch (PDOException $e)
    {
        throw new Exception('Database query error');
    }

}

?> 
