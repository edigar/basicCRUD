<?php

namespace App\Models;

use Core\DataBase;

class Activities {

    public static function getActivities($conditions = null, $columns = null) {
        $table = "activities";
        $columns = $columns == null ? "*" : $columns;
        $db = DataBase::getInstance();

        return $db->getList($table, $columns, $conditions);
    }

    public static function recordActivity($data = null) {
        if($data != null && is_array($data)) {
            $table = "activities";
            $data['module_id'] = (int)$data['module_id'];
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");

            $db = DataBase::getInstance();
            return $db->insert($table, $data);
        }

        return false;
    }

    public static function updateActivity($data = null) {
        if($data != null && is_array($data) && isset($data['id'])) {
            $table = "activities";
            $condition = array('id' => $data['id']);
            $data['id'] = (int)$data['id'];
            $data['updated_at'] = date("Y-m-d H:i:s");

            $db = DataBase::getInstance();
            return $db->update($table, $data, $condition);
        }

        return false;
    }

    public static function deleteActivity($id = null) {
        if($id != null) {
            $table = "activities";
            $column['id'] = $id;
            $db = DataBase::getInstance();
            return $db->delete($table, $column);
        }

        return false;
    }
}
