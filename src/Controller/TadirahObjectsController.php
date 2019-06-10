<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TadirahObjects Controller
 *
 * @property \App\Model\Table\TadirahObjectsTable $TadirahObjects
 *
 * @method \App\Model\Entity\TadirahObject[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TadirahObjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tadirahObjects = $this->paginate($this->TadirahObjects);

        $this->set(compact('tadirahObjects'));
    }

    /**
     * View method
     *
     * @param string|null $id Tadirah Object id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tadirahObject = $this->TadirahObjects->get($id, [
            'contain' => ['Courses']
        ]);

        $this->set('tadirahObject', $tadirahObject);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tadirahObject = $this->TadirahObjects->newEntity();
        if ($this->request->is('post')) {
            $tadirahObject = $this->TadirahObjects->patchEntity($tadirahObject, $this->request->getData());
            if ($this->TadirahObjects->save($tadirahObject)) {
                $this->Flash->success(__('The tadirah object has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tadirah object could not be saved. Please, try again.'));
        }
        $courses = $this->TadirahObjects->Courses->find('list', ['limit' => 200]);
        $this->set(compact('tadirahObject', 'courses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tadirah Object id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tadirahObject = $this->TadirahObjects->get($id, [
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tadirahObject = $this->TadirahObjects->patchEntity($tadirahObject, $this->request->getData());
            if ($this->TadirahObjects->save($tadirahObject)) {
                $this->Flash->success(__('The tadirah object has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tadirah object could not be saved. Please, try again.'));
        }
        $courses = $this->TadirahObjects->Courses->find('list', ['limit' => 200]);
        $this->set(compact('tadirahObject', 'courses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tadirah Object id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tadirahObject = $this->TadirahObjects->get($id);
        if ($this->TadirahObjects->delete($tadirahObject)) {
            $this->Flash->success(__('The tadirah object has been deleted.'));
        } else {
            $this->Flash->error(__('The tadirah object could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
