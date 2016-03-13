<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Columns Controller
 *
 * @property \App\Model\Table\ColumnsTable $Columns
 */
class ColumnsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rooms']
        ];
        $this->set('columns', $this->paginate($this->Columns));
        $this->set('_serialize', ['columns']);
    }

    /**
     * View method
     *
     * @param string|null $id Column id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $column = $this->Columns->get($id, [
            'contain' => ['Rooms']
        ]);
        $this->set('column', $column);
        $this->set('_serialize', ['column']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $column = $this->Columns->newEntity();
        if ($this->request->is('post')) {
            $inputs=$this->request->data;
            $flag=false;
            $i=1;
            for($i;$i<=$inputs['name'];$i++)
            {
                $this->request->data['name']=$i;

                $column = $this->Columns->patchEntity($column, $this->request->data);
                $this->Columns->save($column);
                $column = $this->Columns->newEntity();
                $flag=true;
            }
            if ($flag) {
                $this->Flash->success(__('The column has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The column could not be saved. Please, try again.'));
            }
        }
        $rooms = $this->Columns->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('column', 'rooms'));
        $this->set('_serialize', ['column']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Column id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $column = $this->Columns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $column = $this->Columns->patchEntity($column, $this->request->data);
            if ($this->Columns->save($column)) {
                $this->Flash->success(__('The column has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The column could not be saved. Please, try again.'));
            }
        }
        $rooms = $this->Columns->Rooms->find('list', ['limit' => 200]);
        $this->set(compact('column', 'rooms'));
        $this->set('_serialize', ['column']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Column id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $column = $this->Columns->get($id);
        if ($this->Columns->delete($column)) {
            $this->Flash->success(__('The column has been deleted.'));
        } else {
            $this->Flash->error(__('The column could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
