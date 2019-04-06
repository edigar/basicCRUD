<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Activities;

class ActivitiesController extends Controller
{
    public function index() {
        $this->view('activities');
    }

    public function record() {
        global $mail;
        $result = Activities::recordContact($_POST);
        if($result)
        {
            $message = "Nome: {$_POST['name']}\nAssunto: {$_POST['subject']}\nComentário:\n{$_POST['comment']}";
            mail($mail['email'],$mail['subject'],$message);
        }
        if($result){
            $this->view('success');
        } else {
            $this->view('error');
        }
    }
}