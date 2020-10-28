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

    public function login(string $name, string $password): bool
    {
        global $pdo;

        $name = trim($name);
        $password = trim($password);

        if (!$this->isNameValid($name)) return FALSE

        if (!$this->isPassworddValid($password))
        {
            return FALSE;
        }

        /* Look for the account in the db. Note: the account must be enabled (account_enabled = 1) */
        $query = 'SELECT * FROM myschema.accounts WHERE (account_name = :name) AND (account_enabled = 1)';

        /* Values array for PDO */
        $values = array(':name' => $name);

        /* Execute the query */
        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
        /* If there is a PDO exception, throw a standard exception */
        throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        /* If there is a result, we must check if the password matches using password_verify() */
        if (is_array($row))
        {
            if (password_verify($password, $row['account_password']))
            {
                /* Authentication succeeded. Set the class properties (id and name) */
                $this->id = intval($row['account_id'], 10);
                $this->name = $name;
                $this->authenticated = TRUE;

                /* Register the current Sessions on the database */
                $this->registerLoginSession();

                /* Finally, Return TRUE */
                return TRUE;
            }
        }

        /* If we are here, it means the authentication failed: return FALSE */
        return FALSE;
    }

    public function isNameValid($name)
    {
        $valid = TRUE;
        return $valid;
    }

    public function isPasswordValid($id, $password)
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

    public function getIdFromName($name)
    {
        global $pdo;

        /* Since this method is public, we check $name again here */
        if (!$this->isNameValid($name)) {
            throw new Exception('Invalid user name');
        }

        $id = NULL;

        $query = 'SELECT user_id FROM User WHERE (username = :name)';
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

        if (is_array($row)) $id = intval($row['account_id'], 10);

        return $id;
    }
}