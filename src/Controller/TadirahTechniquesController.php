<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TadirahTechniques Controller
 *
 * @property \App\Model\Table\TadirahTechniquesTable $TadirahTechniques
 *
 * @method \App\Model\Entity\TadirahTechnique[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TadirahTechniquesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tadirahTechniques = $this->paginate($this->TadirahTechniques);

        $this->set(compact('tadirahTechniques'));
    }

    /**
     * View method
     *
     * @param string|null $id Tadirah Technique id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tadirahTechnique = $this->TadirahTechniques->get($id, [
            'contain' => ['Courses', 'TadirahActivities']
        ]);

        $this->set('tadirahTechnique', $tadirahTechnique);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tadirahTechnique = $this->TadirahTechniques->newEntity();
        if ($this->request->is('post')) {
            $tadirahTechnique = $this->TadirahTechniques->patchEntity($tadirahTechnique, $this->request->getData());
            if ($this->TadirahTechniques->save($tadirahTechnique)) {
                $this->Flash->success(__('The tadirah technique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tadirah technique could not be saved. Please, try again.'));
        }
        $courses = $this->TadirahTechniques->Courses->find('list', ['limit' => 200]);
        $tadirahActivities = $this->TadirahTechniques->TadirahActivities->find('list', ['limit' => 200]);
        $this->set(compact('tadirahTechnique', 'courses', 'tadirahActivities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tadirah Technique id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tadirahTechnique = $this->TadirahTechniques->get($id, [
            'contain' => ['Courses', 'TadirahActivities']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tadirahTechnique = $this->TadirahTechniques->patchEntity($tadirahTechnique, $this->request->getData());
            if ($this->TadirahTechniques->save($tadirahTechnique)) {
                $this->Flash->success(__('The tadirah technique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tadirah technique could not be saved. Please, try again.'));
        }
        $courses = $this->TadirahTechniques->Courses->find('list', ['limit' => 200]);
        $tadirahActivities = $this->TadirahTechniques->TadirahActivities->find('list', ['limit' => 200]);
        $this->set(compact('tadirahTechnique', 'courses', 'tadirahActivities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tadirah Technique id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tadirahTechnique = $this->TadirahTechniques->get($id);
        if ($this->TadirahTechniques->delete($tadirahTechnique)) {
            $this->Flash->success(__('The tadirah technique has been deleted.'));
        } else {
            $this->Flash->error(__('The tadirah technique could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
