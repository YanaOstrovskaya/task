<?php
namespace Models;

use PDO;
use Core\Model;

class PriorityModel extends Model
{
    public static function all()
    {
        $res = self::$pdo->query('SELECT id, name FROM priorities ORDER BY id DESC');
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    //static function filter(['key'=>'value'])


    public static function add($name)
    {
        $st = self::$pdo->prepare("INSERT INTO priorities (name) VALUES(:name)");
        $st->bindParam(':name', $name, PDO::PARAM_STR);
        $st->execute();
    }

    public static function get($id)
    {
        $res = self::$pdo->query('SELECT id, name FROM priorities WHERE id='.$id);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name)
    {
        self::$pdo->query("UPDATE priorities SET name='$name' WHERE id='$id'");
    }

    public static function delete($id)
    {
        self::$pdo->query('DELETE FROM priorities WHERE id='.$id);
    }

    // static function filter($key, $value){
    // 	$query = self::$pdo->prepare('SELECT * WHERE ? = ?');
    // 	$res = $query->execute([$key , $value]);
    // 	return $res->fetchAll(PDO::FETCH_ASSOC);
    // }
}
