<?php

class shuvo
{

	private $conn;
	public function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost;dbname=admin",'root','');
	}

	public function show($table)
	{
		$sql = $this->conn->query("SELECT * FROM $table");
		$query = $sql->fetchAll();
		return $query;
	}

	public function insert($columns,$values,$table)
	{
		foreach ($columns as $key => $column)
			$placeholders[] = '?';
		
		$sql = $this->conn->prepare("INSERT INTO $table (".implode(',', $columns).") VALUES (".implode(',', $placeholders).") ");
		$query = $sql->execute($values);
		
		return true;
	}

	public function profile($id,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE id = ? ");
		$query = $sql->execute(array($id));
		$data = $sql->fetch();
		return $data;
	}

	public function update($id,$columns,$values,$table)
	{
		foreach ($columns as $key => $column) 
			$update[] = "$column = ?";
		
		$sql = $this->conn->prepare("UPDATE $table SET ".implode(',', $update)." WHERE id = ? ");
		
		$values[] = $id;
		
		$query = $sql->execute($values);
		return true;
	}

	public function punchout($user_id,$columns,$values,$table)
	{
		foreach ($columns as $key => $column) 
			$update[] = "$column = ?";
		
		$sql = $this->conn->prepare("UPDATE $table SET ".implode(',', $update)." WHERE user_id = ? ");
		
		$values[] = $user_id;
		
		$query = $sql->execute($values);
		return true;
	}

	public function delete($id,$table)
	{
		$sql = $this->conn->prepare("DELETE FROM $table WHERE id = ? ");
		$query = $sql->execute(array($id));
		return true;
	}

	public function findUserByEmail($email,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE email = ? ");
		$query = $sql->execute(array($email));
		$data = $sql->fetch();
		return $data;
	}

	public function findUserByID($employee_id,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE employee_id = ? ");
		$query = $sql->execute(array($employee_id));
		$data = $sql->fetch();
		return $data;
	}

	public function findLastRowUserByID($user_id,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE user_id= ? ORDER BY id DESC LIMIT 1");
		$query = $sql->execute(array($user_id));
		$data = $sql->fetch();
		return $data;
	}

	public function login($data,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE email=? ");
		$query = $sql->execute($data);
		$data = $sql->fetch();
		return $data;
	}

	public function FindByMonth($data,$table)
	{
		$sql = $this->conn->prepare("SELECT * FROM $table WHERE month= ?");
		$query = $sql->execute($data);
		$data = $sql->fetchAll();
		return $data;
	}

	public function employeeView()
	{
		$sql = $this->conn->prepare("SELECT employee.id,employee.employee_id,users.name,employee.user_id,users.status,users.email,employee.salary,employee.designation
		FROM employee
		INNER JOIN users on employee.user_id=users.id");
		$query = $sql->execute();
		$data = $sql->fetchAll();
		return $data;
	}

	public function ReportView()
	{
		$sql = $this->conn->prepare("SELECT users.name,report.amount,report.status
		FROM report 
		INNER JOIN users on report.user_id=users.id");
		$query = $sql->execute();
		$data = $sql->fetchAll();
		return $data;
	}

	public function ReportGenerat()
	{
		$sql = $this->conn->prepare("SELECT users.name,employee.employee_id,employee.salary,users.status
		FROM employee
		INNER JOIN users on employee.user_id=users.id");
		$query = $sql->execute();
		$data = $sql->fetchAll();
		return $data;
	}

	


}
?>