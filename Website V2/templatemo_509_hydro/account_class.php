<?php

require 'password.php';

class Account
{
	private $id;
    private $name;
    private $password;
    private $email;
    private $cell;
    private $first_name;
    private $last_name;
	private $isAuthenticated;


	public function __construct()
	{
		$this->id = NULL;
        $this->name = NULL;
        $this->password = NULL;
        $this->email = NULL;
        $this->cell = NULL;
        $this->first_name = NULL;
        $this->last_name = NULL;
		$this->isAuthenticated = FALSE;
	}

	public function __destruct()
	{
		// echo 'Account class deleted';
	}

    public function addAccount($name, $password, $email, $cell, $first_name, $last_name)
    {
        global $pdo;

        $name = trim($name);
        $email = trim($email);
        $cell = trim($cell);
        $first_name = trim($first_name);
        $last_name = trim($last_name);

        if (!$this->isNameValid($name)) {
            throw new Exception('Invalid username');
        }

        if (!$this->isPasswordValid($password)) {
            throw new Exception('Invalid password');
        }

        if (!is_null($this->getIdFromName($name))) {
            throw new Exception('Username not available');
        }

        $query = 'INSERT INTO g1116887.User (username, pass, need_pwch, email, cell, fir_name, las_name, creat_time) VALUES (:name, :password, 0, :email, :cell, :fname, :lname, CURDATE())';

        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        $values = array(':name' => $name, ':password' => $hash, ':email' => $email, ':cell' => $cell, ':fname' => $first_name, ':lname' => $last_name);

        try
        {
            $pdo->beginTransaction();
            $res = $pdo->prepare($query);
            $res->execute($values);
            $pdo->commit();
        }
        catch (PDOException $e)
        {
            throw new Exception($e->getMessage());
        }

        return $pdo->lastInsertId();
    }

    public function editAccount($id, $name, $password, $email, $cell, $first_name, $last_name)
    {
        global $pdo;

        $name = trim($name);
        $email = trim($email);
        $cell = trim($cell);
        $first_name = trim($first_name);
        $last_name = trim($last_name);

        if (!$this->isIdValid($id)) throw new Exception('Invalid account ID');
        if (!$this->isNameValid($name)) throw new Exception('Invalid username');
        if (!$this->isPasswdValid($password)) throw new Exception('Invalid password');

        $idFromName = $this->getIdFromName($name);
        if (!is_null($idFromName) && ($idFromName != $id)) throw new Exception('Username already used');


        $query = 'UPDATE myschema.accounts SET account_name = :name, account_password = :password, account_enabled = :enabled WHERE account_id = :id';

        $hash = password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 10]);

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

    public function login($email, $password)
    {
        global $pdo;

        $email = trim($email);
        $password = trim($password);

        if (!$this->isEmailValid($email)) return FALSE;
        if (!$this->isPasswordValid($password)) return FALSE;

        $query = 'SELECT * FROM g1116887.User WHERE (email = :email)';
        // $query = 'SELECT * FROM g1116887.User WHERE (account_name = :name) AND (account_enabled = 1)';

        $values = array(':email' => $email);

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

        if (is_array($row))
        {
            if (password_verify($password, $row['pass']))
            {
                $this->id = intval($row['user_id'], 10);
                $this->name = $row['username'];
                $this->authenticated = TRUE;

                /* Register the current Sessions on the database */
                // $this->registerLoginSession();

                return TRUE;
            }
        }

        return FALSE;
    }

    public function isNameValid($name)
    {
        $valid = TRUE;
        return $valid;
    }

    public function isPasswordValid($password)
    {
        // Probably should be used on sign-in not account creation
        $valid = TRUE;
        return $valid;
    }

    public function isIdValid($id)
    {
        // Not really a useful function...
        $valid = TRUE;
        return $valid;
    }

    public function isEmailValid($email)
    {
        if (preg_match('/.+@.+\..+/i', $email)) return TRUE;
        else return FALSE;
    }

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