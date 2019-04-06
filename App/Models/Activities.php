<?php

namespace App\Models;

use Core\DataBase;

class Activities {

    public static function getActivities() {
        $table = "activities";
        $columns = "*";
        $db = DataBase::getInstance();
        $activities = $db->getList($table, $columns);
        return $activities;
    }

    public static function recordActivity($data) {
        $table = "activities";
        $db = DataBase::getInstance();
        $result = $db->insert($table, $data);
        return $result;
    }

    public static function deleteActivity($id) {
        $table = "activities";
        $column['id'] = $id;
        $db = DataBase::getInstance();
        $result = $db->delete($table, $column);
        return $result;
    }
}