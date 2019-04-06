<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Modules;

class ModulesController extends Controller {
    
    public function index() {
        $modules = Modules::getModules();
        $this->view('modules', $modules);
    }

    public function delete($id = null) {
        $result = Modules::deleteModule($id);
        $modules = Modules::getModules();
        $this->view('modules', $modules);
    }

    public function record($module = null) {
        if($module != null) {
            $result = Modules::recordModule($module);
        }

        $modules = Modules::getModules();
        $this->view('modules', $modules);
    }

    public function edit($id = null) {
        $modules = Modules::getModules(array('id' => $id));
        $edit = array('controller' => 'modules', 'name' => 'Módulo', 'data' => $modules[0]);
        $this->view('edit', $edit);
    }

    public function update($module = null) {;
        if($module != null) {
            $result = Modules::updateModule($module);
        }

        $modules = Modules::getModules();
        $this->view('modules', $modules);
    }
}