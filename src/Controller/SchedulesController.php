<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 */
class SchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Rooms','Sections']
        ];
        $this->set('schedules', $this->paginate($this->Schedules));
        $this->set('_serialize', ['schedules']);
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Courses', 'Rooms']
        ]);
        $this->set('schedule', $schedule);
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Schedules->Courses->find('list', ['limit' => 200]);
        $rooms = $this->Schedules->Rooms->find('list')
        ->select(['Rooms.name'])
        ->distinct('Rooms.name')
        ->toArray();
        $this->set(compact('schedule', 'courses', 'rooms'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Sections']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Schedules->Courses->find('list', ['limit' => 200]);
        $rooms = $this->Schedules->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'courses', 'rooms'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ajax($action=null)
    {
        if($action=="section")
        {
            $course_id= $this->request->data['course_id'];
            $this->loadModel('Sections');
            $sections=$this->Sections->find('all',['conditions'=>['Sections.course_id'=>$course_id],'fields'=>['Sections.id','Sections.name']])->toArray();
            $this->response->body(json_encode($sections));
            return $this->response;
        }

        if($action=="room")
        {
            $room_id= $this->request->data['room_id'];
            $this->loadModel('Columns');
            $column=$this->Columns->find('all',['conditions'=>['Columns.room_id'=>$room_id],'fields'=>['Columns.id','Columns.name']])->toArray();
            $this->response->body(json_encode($column));
            return $this->response;
        }

        if($action=='exam_type')
        {

            $exam_type=$this->request->data['exam_type'];
            $slot=Configure::read($exam_type);
            $this->response->body(json_encode($slot));
            return $this->response;
        }

        if($action=='column')
        {
            $column_id=$this->request->data['column_id'];
            $this->loadModel('Columns');
            $column=$this->Columns->get($column_id);
            $this->response->body(json_encode($column['capacity']));
            return $this->response;


        }


    }

    public function getRemainStudent()
    {
        $section_id=$this->request->data['section_id'];
        $semester=$this->request->data['semester'];
        $exam_type=$this->request->data['exam_type'];
        //$section_id=1;
        $this->loadModel('Sections');
        $section_capacity=$this->Sections->find()
            ->select(['Sections.total_student','Sections.is_complete'])
            ->where(['Sections.id'=>$section_id])
            ->first()
            ->toArray()
        ;
        $results=$this->Schedules->find('all',['conditions'=>['Schedules.section_id'=>$section_id,'Schedules.semester'=>$semester,'Schedules.exam_type'=> $exam_type],'fields'=>['Schedules.number_of_student']]);
        $remain_student=0;
        foreach($results as $value)
        {
            $remain_student+=$value->number_of_student;
        }

        $arr[]=$section_capacity['total_student'];
        $arr[]=$remain_student;
        $arr[]=$section_capacity['is_complete'];

        $this->response->body(json_encode($arr));
        return $this->response;

    }

    public function getRoomInfo()
    {
        $input=$this->request->data;

        $this->loadModel('Columns');
        $condition="schedules.column_id=Columns.id and schedules.semester ='".$input['semester']."' and schedules.exam_type ='".$input['exam_type']."' and schedules.slot ='".$input['slot']."' and schedules.date ='".$input['date']." '";
        $room=$this->Columns->find()
            ->select(['sections.name','courses.name','courses.code','schedules.number_of_student','Columns.name'])
            ->where(['Columns.room_id'=>$input['room_id']])
            ->leftJoin('schedules',$condition)
            ->leftJoin('courses','courses.id =schedules.course_id')
            ->leftJoin('sections','sections.id=schedules.section_id')
            ->order(['Columns.id'=>'ASC'])
            ->toArray()
        ;

        $result=array();
        foreach($room as $rm)
        {
            $arr['column']=$rm->name;
            $arr['section']=$rm['sections']['name'];
            $arr['course']=$rm['courses']['name'];
            $arr['code']=$rm['courses']['code'];
            $arr['student']=$rm['schedules']['number_of_student'];

            $result[]=$arr;
        }

        $this->response->body(json_encode($result));

        return $this->response;
    }
}
