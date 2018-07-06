<?php
namespace Models;

use PDO;
use Core\Model;

class TaskModel extends Model
{
	static function add($data){
		extract($data);
		//var_dump($data[0]);
		$st = self::$pdo->prepare("INSERT INTO tasks (name, discription, type_id, priority_id) VALUES(:name, :discription, :type_id, :priority_id)");
		$st->bindParam(':name', $data[0], PDO::PARAM_STR);
		$st->bindParam(':discription', $data[1], PDO::PARAM_STR);
		$st->bindParam(':type_id', $data[2], PDO::PARAM_INT);
		$st->bindParam(':priority_id', $data[3], PDO::PARAM_INT);

		$res = $st->execute();

	    return $res->fetchAll(PDO::FETCH_ASSOC);
	}

}