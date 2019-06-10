<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeletionReasons Controller
 *
 * @property \App\Model\Table\DeletionReasonsTable $DeletionReasons
 *
 * @method \App\Model\Entity\DeletionReason[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeletionReasonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $deletionReasons = $this->paginate($this->DeletionReasons);

        $this->set(compact('deletionReasons'));
    }

    /**
     * View method
     *
     * @param string|null $id Deletion Reason id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deletionReason = $this->DeletionReasons->get($id, [
            'contain' => ['Courses']
        ]);

        $this->set('deletionReason', $deletionReason);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deletionReason = $this->DeletionReasons->newEntity();
        if ($this->request->is('post')) {
            $deletionReason = $this->DeletionReasons->patchEntity($deletionReason, $this->request->getData());
            if ($this->DeletionReasons->save($deletionReason)) {
                $this->Flash->success(__('The deletion reason has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deletion reason could not be saved. Please, try again.'));
        }
        $this->set(compact('deletionReason'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Deletion Reason id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deletionReason = $this->DeletionReasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deletionReason = $this->DeletionReasons->patchEntity($deletionReason, $this->request->getData());
            if ($this->DeletionReasons->save($deletionReason)) {
                $this->Flash->success(__('The deletion reason has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The deletion reason could not be saved. Please, try again.'));
        }
        $this->set(compact('deletionReason'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Deletion Reason id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deletionReason = $this->DeletionReasons->get($id);
        if ($this->DeletionReasons->delete($deletionReason)) {
            $this->Flash->success(__('The deletion reason has been deleted.'));
        } else {
            $this->Flash->error(__('The deletion reason could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
