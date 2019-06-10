<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CourseDurationUnits Controller
 *
 * @property \App\Model\Table\CourseDurationUnitsTable $CourseDurationUnits
 *
 * @method \App\Model\Entity\CourseDurationUnit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourseDurationUnitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $courseDurationUnits = $this->paginate($this->CourseDurationUnits);

        $this->set(compact('courseDurationUnits'));
    }

    /**
     * View method
     *
     * @param string|null $id Course Duration Unit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseDurationUnit = $this->CourseDurationUnits->get($id, [
            'contain' => ['Courses']
        ]);

        $this->set('courseDurationUnit', $courseDurationUnit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseDurationUnit = $this->CourseDurationUnits->newEntity();
        if ($this->request->is('post')) {
            $courseDurationUnit = $this->CourseDurationUnits->patchEntity($courseDurationUnit, $this->request->getData());
            if ($this->CourseDurationUnits->save($courseDurationUnit)) {
                $this->Flash->success(__('The course duration unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course duration unit could not be saved. Please, try again.'));
        }
        $this->set(compact('courseDurationUnit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Duration Unit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseDurationUnit = $this->CourseDurationUnits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseDurationUnit = $this->CourseDurationUnits->patchEntity($courseDurationUnit, $this->request->getData());
            if ($this->CourseDurationUnits->save($courseDurationUnit)) {
                $this->Flash->success(__('The course duration unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course duration unit could not be saved. Please, try again.'));
        }
        $this->set(compact('courseDurationUnit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Duration Unit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseDurationUnit = $this->CourseDurationUnits->get($id);
        if ($this->CourseDurationUnits->delete($courseDurationUnit)) {
            $this->Flash->success(__('The course duration unit has been deleted.'));
        } else {
            $this->Flash->error(__('The course duration unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
