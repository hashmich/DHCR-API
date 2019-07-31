<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disciplines Controller
 *
 * @property \App\Model\Table\DisciplinesTable $Disciplines
 *
 * @method \App\Model\Entity\Discipline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisciplinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->Disciplines->evaluateQuery($this->request->getQuery());
        
        $course_parent_types = $this->Disciplines->getDisciplines();
        
        $this->set('course_parent_types', $course_parent_types);
        $this->set('_serialize', 'course_parent_types');
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Discipline id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $course_parent_type = $this->Disciplines->getDiscipline($id);
        
        $this->set('course_parent_type', $course_parent_type);
        $this->set('_serialize', 'course_parent_type');
    }
}
