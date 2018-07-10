<?php
namespace Models;

use PDO;
use Core\Model;

class TaskModel extends Model
{

	static function  unique($name)
	{
		$st = self::$pdo->prepare('SELECT * FROM tasks WHERE name='.$name);
		$st->bindParam(':name', $name, PDO::PARAM_STR);
		$res = $st->execute();
		return empty($res);

	}


	static function all()
	{
		$res = self::$pdo->query('SELECT tasks.id, tasks.name, tasks.discription, tasks.status, types.name as type, priorities.name as priority, files.path_files FROM tasks LEFT JOIN types ON tasks.type_id = types.id LEFT JOIN priorities ON tasks.priority_id = priorities.id LEFT JOIN files ON tasks.id = files.task_id ORDER BY tasks.id DESC');
			
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

	static function add($data){
		extract($data);
		//var_dump($data[0]);
		$st = self::$pdo->prepare("INSERT INTO tasks (name, discription, type_id, priority_id) VALUES(:name, :discription, :type_id, :priority_id)");
		$st->bindParam(':name', $data[0], PDO::PARAM_STR);
		$st->bindParam(':discription', $data[1], PDO::PARAM_STR);
		$st->bindParam(':type_id', $data[2], PDO::PARAM_INT);
		$st->bindParam(':priority_id', $data[3], PDO::PARAM_INT);
		$st->execute();
		$id = self::$pdo->lastInsertId();
        $answer = self::$pdo->query('SELECT * FROM tasks WHERE id='.$id);
		return $answer->fetchAll(PDO::FETCH_ASSOC);

	}


		static function get($id)
	{
		$res = self::$pdo->query('SELECT tasks.id, tasks.name, tasks.discription, tasks.status, types.name as type, priorities.name as priority, files.path_files FROM tasks LEFT JOIN types ON tasks.type_id = types.id LEFT JOIN priorities ON tasks.priority_id = priorities.id LEFT JOIN files ON tasks.id = files.task_id WHERE tasks.id='.$id);
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

		static function getStatus()
	{
		$res = self::$pdo->query("SHOW COLUMNS FROM tasks WHERE field = 'status'");
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

		static function updateStatus($id, $status){
	
    	//var_dump($id);
    	//var_dump($status);
    	self::$pdo->query("UPDATE tasks SET status='$status' WHERE id='$id'");

	}
		static function update($id, $data){
		extract($data);
    
    	self::$pdo->query("UPDATE tasks SET name='$data[0]', discription='$data[1]', type_id='$data[2]', priority_id='$data[3]' WHERE id='$id'");

	}

		static function delete($id){
	
			self::$pdo->query("DELETE FROM tasks WHERE id='$id'");

	}



}