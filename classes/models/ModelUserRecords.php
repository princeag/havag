<?php

class ModelUserRecords{
    public $email, $name, $mobile, $occupation, $short_bio, $gender, $password, $profile, $resume_file, $dob, $user_note, $user_tags, $date_add, $date_upd;

    public function __construct($arr = []){
        if(!empty($arr) && is_array($arr)) {
            foreach($arr as $col_name => $value) {
                $this->$col_name = $value;
            }
        }
    }

    public function addUserRecord() {
        $sql = "INSERT INTO user_records (name, email, mobile, occupation, short_bio, gender, password, profile, resume_file, dob, date_add) VALUES (:name, :email, :mobile, :occupation, :short_bio, :gender, :password, :profile, :resume_file, :dob, :date_add)";

		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
		$stmt->bindParam(':mobile', $this->mobile, PDO::PARAM_STR);
		$stmt->bindParam(':occupation', $this->occupation, PDO::PARAM_STR);
		$stmt->bindParam(':short_bio', $this->short_bio, PDO::PARAM_STR);
		$stmt->bindParam(':gender', $this->gender, PDO::PARAM_INT);
		$stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
		$stmt->bindParam(':profile', $this->profile, PDO::PARAM_STR);
		$stmt->bindParam(':resume_file', $this->resume_file, PDO::PARAM_STR);
		$stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
		$stmt->bindParam(':date_add', $this->date_add, PDO::PARAM_STR);
		$stmt->execute();
		
		$num_rows = $stmt->rowCount();
		return !$num_rows ? false : true;
    }

    public function updateUserRecord() {
        $sql = "UPDATE user_records SET name = :name, mobile = :mobile, occupation = :occupation, short_bio = :short_bio, gender = :gender, password = :password, profile = :profile, resume_file = :resume_file, dob = :dob, date_upd = :date_upd WHERE email = :email LIMIT 1";

		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
		$stmt->bindParam(':mobile', $this->mobile, PDO::PARAM_STR);
		$stmt->bindParam(':occupation', $this->occupation, PDO::PARAM_STR);
		$stmt->bindParam(':short_bio', $this->short_bio, PDO::PARAM_STR);
		$stmt->bindParam(':gender', $this->gender, PDO::PARAM_INT);
		$stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
		$stmt->bindParam(':profile', $this->profile, PDO::PARAM_STR);
		$stmt->bindParam(':resume_file', $this->resume_file, PDO::PARAM_STR);
		$stmt->bindParam(':dob', $this->dob, PDO::PARAM_STR);
		$stmt->bindParam(':date_upd', $this->date_upd, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->execute();
		
		$num_rows = $stmt->rowCount();
		return !$num_rows ? false : true;
    }

    public function getAllUserRecords($start, $length, $sort_by, $sort_order) {
        $sql = "SELECT email, name, profile, occupation, DATE_FORMAT(dob, '%d %b %Y') dob, mobile, (CASE WHEN gender = 1 THEN 'Male' WHEN gender = 2 THEN 'Female' ELSE 'Other' END) gender, user_tags, user_note FROM user_records ORDER BY ".$sort_by." ".$sort_order." LIMIT ".$length." OFFSET ".$start;
		// error_log($sql);
		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$num_rows = $stmt->rowCount();
		
		return !$num_rows ? false : $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function getAllUserRecordsBySearch($where, $start, $length, $sort_by, $sort_order) {
        $sql = "SELECT email, name, profile, occupation, DATE_FORMAT(dob, '%d %b %Y') dob, mobile, (CASE WHEN gender = 1 THEN 'Male' WHEN gender = 2 THEN 'Female' ELSE 'Other' END) gender, user_tags, user_note FROM user_records WHERE (".$where.") ORDER BY ".$sort_by." ".$sort_order." LIMIT ".$length." OFFSET ".$start;
		error_log($sql);
		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$num_rows = $stmt->rowCount();
		
		return !$num_rows ? false : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAllUserRecords() {
        $sql = "SELECT count(email) FROM user_records";
		// error_log($sql);
		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$num_rows = $stmt->rowCount();
		
		return !$num_rows ? false : $stmt->fetch(PDO::FETCH_COLUMN);
	}
	
	public function getUserRecordByEmail() {
        $sql = "SELECT profile, resume_file FROM user_records WHERE email = :email LIMIT 1";
		// error_log($sql);
		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->execute();
		$num_rows = $stmt->rowCount();
		
		return !$num_rows ? false : $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getUserRecordDetailByEmail() {
        $sql = "SELECT name, email, mobile, '*****' password, occupation, short_bio, dob, (CASE WHEN gender = 1 THEN 'Male' WHEN gender = 2 THEN 'Female' ELSE 'Other' END) gender, profile, resume_file, user_note, user_tags, date_add FROM user_records WHERE email = :email LIMIT 1";
		// error_log($sql);
		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->execute();
		$num_rows = $stmt->rowCount();
		
		return !$num_rows ? false : $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function updateUserTags() {
        $sql = "UPDATE user_records SET user_tags = :user_tags, date_upd = :date_upd WHERE email = :email LIMIT 1";

		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_tags', $this->user_tags, PDO::PARAM_STR);
		$stmt->bindParam(':date_upd', $this->date_upd, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->execute();
		
		$num_rows = $stmt->rowCount();
		return !$num_rows ? false : true;
	}
	
	public function updateUserNote() {
        $sql = "UPDATE user_records SET user_note = :user_note, date_upd = :date_upd WHERE email = :email LIMIT 1";

		$db = Db::PdoConnection();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':user_note', $this->user_note, PDO::PARAM_STR);
		$stmt->bindParam(':date_upd', $this->date_upd, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->execute();
		
		$num_rows = $stmt->rowCount();
		return !$num_rows ? false : true;
    }
}