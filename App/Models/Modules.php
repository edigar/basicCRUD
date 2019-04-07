<?php

namespace App\Models;

use Core\DataBase;

class Modules {

    public static function getModules($conditions = null, $columns = null) {
        $table = "modules";
        $columns = $columns == null ? "*" : $columns;
        $db = DataBase::getInstance();
        $modules = $db->getList($table, $columns, $conditions);
        
        foreach ($modules as $key => $module) {
            $total = $db->getList("activities", "count(*)", array("module_id" => $module['id']));
            $modules[$key]['totalActivities'] = (int)$total[0]['count(*)'];
        }

        return $modules;
    }

    public static function recordModule($data = null) {
        if($data != null && is_array($data)) {
            $table = "modules";
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");

            $db = DataBase::getInstance();
            return $db->insert($table, $data);
        }

        return false;
    }

    public static function updateModule($data = null) {
        if($data != null && is_array($data) && isset($data['id'])) {
            $table = "modules";
            $condition = array('id' => $data['id']);
            $data['id'] = (int)$data['id'];
            $data['updated_at'] = date("Y-m-d H:i:s");

            $db = DataBase::getInstance();
            return $db->update($table, $data, $condition);
        }

        return false;
    }

    public static function deleteModule($id = null) {
        if($id != null) {
            $table = "modules";
            $column['id'] = $id;
            $db = DataBase::getInstance();
            return $db->delete($table, $column);
        }

        return false;
    }
}
