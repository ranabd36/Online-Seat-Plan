<?php


namespace App\Controller;

use App\Controller\AppController;


class DashboardController extends AppController
{
    public function index()
    {
        $this->loadModel('Departments');
        $department=$this->Departments->find('all');
        $number_of_dept=$department->count();

        $this->loadModel('Courses');
        $courses=$this->Courses->find('all');
        $number_of_course=$courses->count();

        $this->loadModel('Rooms');
        $rooms=$this->Rooms->find('all');
        $number_of_room=$rooms->count();

        $this->loadModel('Users');
        $users = $this->Users->find('all');
        $number_of_user = $users->count();



        $this->set(compact(['number_of_dept','number_of_course','number_of_room','number_of_user']));

    }

    public function search()
    {
        $this->loadModel('Departments');
        $departments=$this->Departments->find('list');

        $this->set(compact(['departments']));



        $this->viewBuilder()->layout("common");
    }

    public function getCourse()
    {
        $dept_id=$this->request->data['dept_id'];
        $this->loadModel('Courses');
        $courses=$this->Courses->find('all');
        echo "<pre>";
        print_r($courses);
        echo "</pre>";
        die;
    }



}