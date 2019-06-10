<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CourseParentTypes Controller
 *
 * @property \App\Model\Table\CourseParentTypesTable $CourseParentTypes
 *
 * @method \App\Model\Entity\CourseParentType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourseParentTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $courseParentTypes = $this->paginate($this->CourseParentTypes);

        $this->set(compact('courseParentTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Course Parent Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseParentType = $this->CourseParentTypes->get($id, [
            'contain' => ['CourseTypes', 'Courses']
        ]);

        $this->set('courseParentType', $courseParentType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseParentType = $this->CourseParentTypes->newEntity();
        if ($this->request->is('post')) {
            $courseParentType = $this->CourseParentTypes->patchEntity($courseParentType, $this->request->getData());
            if ($this->CourseParentTypes->save($courseParentType)) {
                $this->Flash->success(__('The course parent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course parent type could not be saved. Please, try again.'));
        }
        $this->set(compact('courseParentType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Parent Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseParentType = $this->CourseParentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseParentType = $this->CourseParentTypes->patchEntity($courseParentType, $this->request->getData());
            if ($this->CourseParentTypes->save($courseParentType)) {
                $this->Flash->success(__('The course parent type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The course parent type could not be saved. Please, try again.'));
        }
        $this->set(compact('courseParentType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Parent Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseParentType = $this->CourseParentTypes->get($id);
        if ($this->CourseParentTypes->delete($courseParentType)) {
            $this->Flash->success(__('The course parent type has been deleted.'));
        } else {
            $this->Flash->error(__('The course parent type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
