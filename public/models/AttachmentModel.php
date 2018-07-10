<?php
namespace Models;

use PDO;
use Core\Model;

class AttachmentModel extends Model
{

		static function all()
	{
		$res = self::$pdo->query('SELECT id, path_files FROM files ORDER BY id DESC');
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

		static function get($id)
	{
		$res = self::$pdo->query('SELECT id, path_files FROM files WHERE id='.$id);
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}
		static function add($file, $taskId){
 		$st = self::$pdo->prepare("INSERT INTO files (path_files, task_id) VALUES(:path_files, :task_id)");
	    $st->bindParam(':path_files', $file, PDO::PARAM_STR);
		$st->bindParam(':task_id', $taskId, PDO::PARAM_INT);
		$st->execute();

	}

		static function update($file, $id)
	{
	
		self::$pdo->query("UPDATE files SET path_files='$file' WHERE task_id='$id'");
	}

		static function delete($id){
		self::$pdo->query('DELETE FROM files WHERE id='.$id);
	}

}