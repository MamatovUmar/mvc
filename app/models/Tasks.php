<?php

namespace app\models;

use app\core\DataBase;
use PDO;
use app\core\Model;

class Tasks extends DataBase
{   

    public function findAll()
    {
        $st = $this->db->prepare('SELECT * FROM `tasks`');
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne($id)
    {
        $id = (int)$id;
        $st = $this->db->prepare('SELECT * FROM `tasks` WHERE id = :id');
        $st->bindParam(':id', $id);
        $st->execute();
        return $st->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($sql, $params= [])
    {
        $query = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
        }
        $query->execute();
        return $query;
    }

    public function update($sql, $params= [])
    {
        $query = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
        }
        $query->execute();
        return $query;
    }
}