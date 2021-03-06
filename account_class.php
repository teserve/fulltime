<?php
//start session
require 'password.php';
include 'db_connection.php';

class Account
{
	public $id;
    public $password;
    public $email;
    public $cell;
    public $first_name;
    public $last_name;
	//construct account
	public function __construct()
	{
		$this->id = NULL;
        $this->password = NULL;
        $this->email = NULL;
        $this->cell = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
    }
		//insert values to its specific variables
    public function addAccount($password, $email, $cell, $first_name, $last_name, $acc_type)
    {
        global $pdo;

        $email = trim($email);
        $cell = trim($cell);
        $first_name = trim($first_name);
        $last_name = trim($last_name);

        if (!$this->isPasswordValid($password)) {
            throw new Exception('Invalid password');
        }

        $user_query = 'INSERT INTO g1116887.User (pass, need_pwch, email, cell, fir_name, las_name) VALUES (:password, 0, :email, :cell, :fname, :lname)';
        $id_query = 'SELECT user_id from g1116887.User WHERE email = :email';

        $type_query = NULL;

        if ($acc_type === "Student")
        {
            $type_query = 'INSERT INTO g1116887.Student (user_id) VALUES ((SELECT user_id FROM g1116887.User WHERE email = :email))';
        }
        elseif ($acc_type === "Employer")
        {
            $type_query = 'INSERT INTO g1116887.Employee (user_id, company) VALUES ((SELECT user_id FROM g1116887.User WHERE email = :email), 1)';
        }
        elseif ($acc_type === "Administration")
        {
            $type_query = 'INSERT INTO g1116887.Admin (user_id, university) VALUES ((SELECT user_id FROM g1116887.User WHERE email = :email), 1)';
        }

        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        $main_values = array(':password' => $hash, ':email' => $email, ':cell' => $cell, ':fname' => $first_name, ':lname' => $last_name);
        $type_values = array(':email' => $email);
        $id_values = $type_values;

        $last_id = NULL;

        try
        {
            $pdo->beginTransaction();

            $res1 = $pdo->prepare($user_query);
            $res1->execute($main_values);

            $res2 = $pdo->prepare($type_query);
            $res2->execute($type_values);

            $res3 = $pdo->prepare($id_query);
            $res3->execute($id_values);

            $pdo->commit();
        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());
        }

        $row = $res3->fetch(PDO::FETCH_ASSOC);
        if (is_array($row)) $last_id = $row['user_id'];

        return $last_id;
    }
		//define information for student account
    public function editAccountStud($id, $password, $email, $cell, $first_name, $last_name)
    {
        global $pdo;

        $email = trim($email);
        $cell = trim($cell);
        $first_name = trim($first_name);
        $last_name = trim($last_name);

        if (!$this->isIdValid($id)) throw new Exception('Invalid account ID');
        if (!$this->isNameValid($name)) throw new Exception('Invalid username');
        if (!$this->isPasswdValid($password)) throw new Exception('Invalid password');

        $query = 'UPDATE g111887.accounts SET account_name = :name, account_password = :password, account_enabled = :enabled WHERE account_id = :id';

        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        $values = array(':name' => $name, ':password' => $hash, ':enabled' => $intEnabled, ':id' => $id);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }
    }
		//delete account or account creation failed if there is invalid values
    public function deleteAccount($id)
    {
        global $pdo;

        if (!$this->isIdValid($id))
        {
            throw new Exception('Invalid account ID');
        }

        $query = 'DELETE FROM g1116887.User WHERE user_id = :id';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $query = 'DELETE FROM g1116887.account_sessions WHERE (account_id = :id)';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }
    }
		//login function
    public function login($email, $password)
    {
        global $pdo;

        $email = trim($email);
        $password = trim($password);

        if (!$this->isEmailValid($email)) return FALSE;
        if (!$this->isPasswordValid($password)) return FALSE;

        $login_query = 'SELECT * FROM g1116887.User WHERE (email = :email)';

        $values = array(':email' => $email);

        try
        {
            $res = $pdo->prepare($login_query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $acc_type = 0;

        if (is_array($row))
        {
            if (password_verify($password, $row['pass']))
            {
                $this->id = intval($row['user_id'], 10);

                if ($this->isStudent($this->id))
                {
                    $acc_type = 'student';
                    echo 'student';
                }
                elseif($this->isEmployee($this->id))
                {
                    $acc_type = 'employee';
                    echo 'employee';
                }
                else
                {
                    $acc_type = 'admin';
                    echo 'admin';
                }
            }
        }
        return $acc_type;
    }
		//define user informations
    public function getInfo($id)
    {
        global $pdo;

        $query = 'SELECT * FROM g1116887.User WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->id = $id;
        $this->first_name = $row['fir_name'];
        $this->last_name = $row['las_name'];
        $this->password = $row['pass'];
        $this->email = $row['email'];
        $this->cell = $row['cell'];
    }
		//define student informations
    public function getInfoStudent($id)
    {
        global $pdo;

        $query = 'SELECT * FROM g1116887.Student WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }
        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->city = $row['city'];
        $this->Nstate = $row['Nstate'];
        $this->country = $row['country'];
        $this->post_code = $row['post_code'];
        $this->university = $row['university'];
        $this->major = $row['major'];
        $this->gpa = $row['gpa'];
        $this->grad_date = $row['grad_date'];
        $this->ed_level = $row['ed_level'];
        $this->bio = $row['bio'];
        $this->region = $row['region'];
        $this->job_type = $row['job_type'];
        $this->industry = $row['industry'];
        $this->project_title1 = $row['project_title1'];
        $this->project_title2 = $row['project_title2'];
        $this->project_descr1 = $row['project_descr1'];
        $this->project_descr2 = $row['project_descr2'];
        $this->work_employer1 = $row['work_employer1'];
        $this->work_position1 = $row['work_position1'];
        $this->work_duration1 = $row['work_duration1'];
        $this->work_descr1 = $row['work_descr1'];
        $this->work_employer2 = $row['work_employer2'];
        $this->work_position2 = $row['work_position2'];
        $this->work_duration2 = $row['work_duration2'];
        $this->work_descr2 = $row['work_descr2'];

    }
		//define student skills
    public function getInfoStuSkills($id)
    {
        global $pdo;

        $query = 'SELECT * FROM g1116887.Student_skills WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }

        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->tech_skill1 = $row['tech_skill1'];
        $this->tech_skill2 = $row['tech_skill2'];
        $this->tech_skill3 = $row['tech_skill3'];
        $this->tech_skill4 = $row['tech_skill4'];
        $this->tech_skill5 = $row['tech_skill5'];
        $this->tech_skill6 = $row['tech_skill6'];
        $this->tech_skill7 = $row['tech_skill7'];
        $this->tech_skill8 = $row['tech_skill8'];
        $this->tech_skill9 = $row['tech_skill9'];
        $this->tech_skill10 = $row['tech_skill10'];
        $this->tech_rate1 = $row['tech_rate1'];
        $this->tech_rate2 = $row['tech_rate2'];
        $this->tech_rate3 = $row['tech_rate3'];
        $this->tech_rate4 = $row['tech_rate4'];
        $this->tech_rate5 = $row['tech_rate5'];
        $this->tech_rate6 = $row['tech_rate6'];
        $this->tech_rate7 = $row['tech_rate7'];
        $this->tech_rate8 = $row['tech_rate8'];
        $this->tech_rate9 = $row['tech_rate9'];
        $this->tech_rate10 = $row['tech_rate10'];
        $this->soft_skill1 = $row['soft_skill1'];
        $this->soft_skill2 = $row['soft_skill2'];
        $this->soft_skill3 = $row['soft_skill3'];
        $this->soft_skill4 = $row['soft_skill4'];
        $this->soft_skill5 = $row['soft_skill5'];
        $this->soft_skill6 = $row['soft_skill6'];
        $this->soft_skill7 = $row['soft_skill7'];
        $this->soft_skill8 = $row['soft_skill8'];
        $this->soft_skill9 = $row['soft_skill9'];
        $this->soft_skill10 = $row['soft_skill10'];
    }
		//define courses
		public function getInfoStuCourses($id)
		{
				global $pdo;

				$query = 'SELECT * FROM g1116887.Student_courses WHERE (user_id = :id)';

				$values = array(':id' => $id);

				try{
						$res = $pdo->prepare($query);
						$res-> execute($values);
				}

				catch(PDOException $e)
				{
						throw new Exception('Database query error');
				}

				$row = $res->fetch(PDO::FETCH_ASSOC);
				$this->course1 = $row['course1'];
				$this->course2 = $row['course2'];
				$this->course3 = $row['course3'];
				$this->course4 = $row['course4'];
				$this->course5 = $row['course5'];
				$this->course_grade1 = $row['course_grade1'];
				$this->course_grade2 = $row['course_grade2'];
				$this->course_grade3 = $row['course_grade3'];
				$this->course_grade4 = $row['course_grade4'];
				$this->course_grade5 = $row['course_grade5'];
		}
		//define admin informations
    public function getInfoAdmin($id)
    {

        global $pdo;

        $query = 'SELECT * FROM g1116887.Admin WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }

        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->city = $row['city'];
        $this->Nstate = $row['Nstate'];
        $this->country = $row['country'];
        $this->post_code = $row['post_code'];
        $this->university = $row['university'];
        $this->position_type = $row['position_type'];
    }
		//define employer informations
    public function getInfoEmployer($id)
    {

        global $pdo;

        $query = 'SELECT * FROM g1116887.Employee WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }

        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->city = $row['city'];
        $this->country = $row['country'];
        $this->post_code = $row['post_code'];
        $this->company = $row['company'];
        $this->position_type = $row['position_type'];
        $this->industry = $row['industry'];

    }
		//define job posting informations
    public function getInfoPostJobs($id)
    {
        global $pdo;

        $query = 'SELECT * FROM g1116887.Job_posting WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }

        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->industry = $row['industry'];
        $this->position = $row['position'];
        $this->job_type = $row['job_type'];
        $this->ed_level = $row['ed_level'];
        $this->gpa = $row['gpa'];
        $this->region = $row['region'];
        $this->company = $row['company'];
        $this->date_post = $row['date_post'];
        $this->date_closed = $row['date_closed'];
        $this->job_descr = $row['job_descr'];

    }
		//define required skills
    public function getInfoJobsSkills($id)
    {
        global $pdo;

        $query = 'SELECT * FROM g1116887.Job_skills WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try{
            $res = $pdo->prepare($query);
            $res-> execute($values);
        }

        catch(PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);
        $this->tech_skill1 = $row['tech_skill1'];
        $this->tech_skill2 = $row['tech_skill2'];
        $this->tech_skill3 = $row['tech_skill3'];
        $this->tech_skill4 = $row['tech_skill4'];
        $this->tech_skill5 = $row['tech_skill5'];
        $this->tech_skill6 = $row['tech_skill6'];
        $this->tech_skill7 = $row['tech_skill7'];
        $this->tech_skill8 = $row['tech_skill8'];
        $this->tech_skill9 = $row['tech_skill9'];
        $this->tech_skill10 = $row['tech_skill10'];
        $this->tech_rate1 = $row['tech_rate1'];
        $this->tech_rate2 = $row['tech_rate2'];
        $this->tech_rate3 = $row['tech_rate3'];
        $this->tech_rate4 = $row['tech_rate4'];
        $this->tech_rate5 = $row['tech_rate5'];
        $this->tech_rate6 = $row['tech_rate6'];
        $this->tech_rate7 = $row['tech_rate7'];
        $this->tech_rate8 = $row['tech_rate8'];
        $this->tech_rate9 = $row['tech_rate9'];
        $this->tech_rate10 = $row['tech_rate10'];
        $this->soft_skill1 = $row['soft_skill1'];
        $this->soft_skill2 = $row['soft_skill2'];
        $this->soft_skill3 = $row['soft_skill3'];
        $this->soft_skill4 = $row['soft_skill4'];
        $this->soft_skill5 = $row['soft_skill5'];
        $this->soft_skill6 = $row['soft_skill6'];
        $this->soft_skill7 = $row['soft_skill7'];
        $this->soft_skill8 = $row['soft_skill8'];
        $this->soft_skill9 = $row['soft_skill9'];
        $this->soft_skill10 = $row['soft_skill10'];
    }
		//count total number of students
    public function countS()
    {
         global $pdo;

        $query = 'SELECT COUNT(*) AS num FROM g1116887.Student ';


        try
        {
            $res = $pdo->prepare($query);
            $res->execute();
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        $tot = $row['num'];

        return $tot;

    }
		//account type validation (student)
    public function isStudent($id)
    {
        global $pdo;

        $student_query = 'SELECT * FROM g1116887.Student WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($student_query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($row)) return TRUE;
        else return FALSE;
    }
		//account type validation (Employer)
    public function isEmployee($id)
    {
        global $pdo;

        $employee_query = 'SELECT * FROM g1116887.Employee WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($employee_query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($row))
        {
            if (is_array($row)) return TRUE;
            else return FALSE;
        }
    }
	//account type validation (Advisor)
    public function isAdministrator($id)
    {
        global $pdo;

        $admin_query = 'SELECT * FROM g1116887.Administrator WHERE (user_id = :id)';

        $values = array(':id' => $id);

        try
        {
            $res = $pdo->prepare($employee_query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($row))
        {
            if (is_array($row)) return TRUE;
            else return FALSE;
        }
        else return FALSE;
    }
		//name values validation
    public function isNameValid($name)
    {
        $valid = TRUE;
        return $valid;
    }
		//password values validation
    public function isPasswordValid($password)
    {
        // Probably should be used on sign-in not account creation
        $valid = TRUE;
        return $valid;
    }
		//ID values validation
    public function isIdValid($id)
    {
        // Not really a useful function...
        $valid = TRUE;
        return $valid;
    }
		//email values validation
    public function isEmailValid($email)
    {
        if (preg_match('/.+@.+\..+/i', $email)) return TRUE;
        else return FALSE;
    }
		//gets user id from user name 
    public function getIdFromName($name)
    {
        global $pdo;

        /* Since this method is public, we check $name again here */
        if (!$this->isNameValid($name)) throw new Exception('Invalid user name');

        $id = NULL;

        $query = 'SELECT user_id FROM g1116887.User WHERE (username = :name)';

        $values = array(':name' => $name);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        if (is_array($row)) $id = intval($row['account_id']);

        return $id;
    }
}
