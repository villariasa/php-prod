<?php

class Farmer {
	private PDO $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}	
	//fetch() => fetch singly row
	//fetchAll() => fetch all the rows
	//fetchColumn() => fetch a single column
	public function getAll(){
		// if SELECT WITHOUT A PLACEHOLDER USE QUERY()
		$sql = "SELECT * FROM FARMER ORDER BY FARMER_ID";
		$stmt = $this->pdo->query($sql);
		# return all rows
		return $stmt->fetchAll();
	}

	public function getById(int $farmer_id){
		// SELECT with placeholder, use prepare() then execute()
		$sql = "SELECT * FROM FARMER WHERE FARMER_ID = :farmer_id";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(["farmer_id" => $farmer_id]);
		# return one row
		return $stmt->fetch();
	}

	public function create(string $first_name, string $last_name, string $contact_number, string $address) {
		$sql = "INSERT INTO FARMER(FIRST_NAME, LAST_NAME, CONTACT_NUMBER, ADDRESS) 
				VALUES (:first_name, :last_name, :contact_number, :address) RETURNING FARMER_ID";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(["first_name" => $first_name,"last_name" => $last_name,
            		"contact_number" => $contact_number, "address" => $address
        		]);
		# return one value
		return $stmt->fetchColumn();

	}

	public function update(int $farmer_id, string $first_name, string $last_name, string $contact_number, string $address) {
		# prepare and execute
		$sql = "UPDATE FARMER SET FIRST_NAME = :first_name, LAST_NAME = :last_name, 
					CONTACT_NUMBER = :contact_number, ADDRESS = :address WHERE FARMER_ID = :farmer_id";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute(["first_name" => $first_name,"last_name" => $last_name,
            		"contact_number" => $contact_number, "address" => $address, "farmer_id" => $farmer_id]);
	}

	public function delete(int $farmer_id) {
		$sql = "DELETE FROM FARMER WHERE FARMER_ID = :farmer_id";
		$stmt = $this->pdo->prepare($sql);
		return $stmt->execute(["farmer_id" => $farmer_id]);
	}
}

