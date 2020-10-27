<?php

require 'password.php';

class Account
{
	private $id;
	private $name;
	private $isAuthenticated;


	public function __construct()
	{
		$this->id = NULL;
		$this->name = NULL;
		$this->isAuthenticated = FALSE;
	}

	public function __destruct()
	{

    }

    public function addAccount(string $name, string $password, string $email, string $cell, string $first_name, string $last_name): int
    {
        global $pdo;

        $name = trim($name);
        $email = trim($email);
        $cell = trim($cell);
        $first_name = trim($first_name);
        $last_name = trim($last_name);

        if (!$this->isNameValid($name)) throw new Exception('Invalid username');
        if (!$this->isPasswordValid($password)) throw new Exception('Invalid password');
        if (!is_null($this->getIdFromName($name))) throw new Exception('Username not available');

        $query = 'INSERT INTO User (username, pass, need_pwch, email, cell, fir_name, las_name) VALUES (:name, :password, 0, :email, :cell, :fname, :lname)';

        $hash = password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 10]);

        $values = array(':name' => $name, ':password' => $hash, ':email' => $email, ':cell' => $cell, ':fname' => $first_name, ':lname' => $last_name);

        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            throw new Exception('Database query error');
        }

        return $pdo->lastInsertId();
    }

    public function editAccount(int $id, string $name, string $password, string $email, string $cell, string $first_name, string $last_name)
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

    public function isNameValid(string $name): bool
    {
        $valid = TRUE;
        return $valid;
    }

    public function isPasswordValid(string $password): bool
    {
        // Probably should be used on sign-in not account creation
        $valid = TRUE;
        return $valid;
    }

    public function isIdValid(int $id): bool
    {
        // Not really a useful function...
        $valid = TRUE;
        return $valid;
    }

    public function getIdFromName(string $name): ?int
    {
        global $pdo;

        /* Since this method is public, we check $name again here */
        if (!$this->isNameValid($name)) throw new Exception('Invalid user name');

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