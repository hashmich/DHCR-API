<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Languages Controller
 *
 * @property \App\Model\Table\LanguagesTable $Languages
 *
 * @method \App\Model\Entity\Language[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->Languages->evaluateQuery($this->request->getQuery());
        
        $course_parent_types = $this->Languages->getLanguages();
        
        $this->set('course_parent_types', $course_parent_types);
        $this->set('_serialize', 'course_parent_types');
    }
    
    
    /**
     * View method
     *
     * @param string|null $id Language id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $course_parent_type = $this->Languages->getLanguage($id);
        
        $this->set('course_parent_type', $course_parent_type);
        $this->set('_serialize', 'course_parent_type');
    }
}
