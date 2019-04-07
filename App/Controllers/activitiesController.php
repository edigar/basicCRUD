<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function index($moduleId) {
        $activities = Activities::getActivities(array("module_id" => $moduleId));
        $activities = empty($activities) ? array(array('module_id' => $moduleId)) : $activities;
        $this->view('activities', $activities);
    }

    public function record($activity = null) {
        if($activity != null) {
            $result = Activities::recordActivity($activity);
        }

        $activities = Activities::getActivities(array("module_id" => $activity['module_id']));
        $this->view('activities', $activities);
    }

    public function delete($id = null) {
        $activity = Activities::getActivities(array("id" => $id));
        $result = Activities::deleteActivity($id);
        $activities = Activities::getActivities(array("module_id" => (int)$activity[0]['module_id']));
        $activities = empty($activities) ? array(array('module_id' => (int)$activity[0]['module_id'])) : $activities;

        $this->view('activities', $activities);
    }

    public function edit($id = null) {
        $activity = Activities::getActivities(array('id' => $id));
        $edit = array('controller' => 'activities', 'name' => 'Atividade', 'data' => $activity[0]);
        $this->view('edit', $edit);
    }

    public function update($activity = null) {;
        if($activity != null) {
            $result = Activities::updateActivity($activity);
        }

        $activities = Activities::getActivities(array("module_id" => $activity['module_id']));
        $this->view('activities', $activities);
    }
}
