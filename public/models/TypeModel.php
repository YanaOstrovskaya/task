<?php
namespace Models;

use PDO;
use Core\Model;

class TypeModel extends Model
{
    public static function all()
    {
        $res = self::$pdo->query('SELECT id, name FROM types ORDER BY id DESC');
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($name)
    {
        $st = self::$pdo->prepare("INSERT INTO types (name) VALUES(:name)");
        $st->bindParam(':name', $name, PDO::PARAM_STR);
        $st->execute();
    }

    public static function get($id)
    {
        $res = self::$pdo->query('SELECT id, name FROM types WHERE id='.$id);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($id, $name)
    {
        self::$pdo->query("UPDATE types SET name='$name' WHERE id='$id'");
    }

    public static function delete($id)
    {
        self::$pdo->query('DELETE FROM types WHERE id='.$id);
    }
}
