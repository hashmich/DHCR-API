<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use http\Exception\BadHeaderException;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 *
 * @method \App\Model\Entity\Course[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
    
    private $_allowedFilters = [
    	'country_id',
		'city_id',
		'institution_id',
		'language_id',
		'course_type_id',
		'course_parent_type_id',
		'discipline_id',
		'tadirah_object_id',
		'tadirah_technique_id',
		'recent',
		'start_date',
		'end_date'
	];
    
    private $_containments = [
		'DeletionReasons',
		'Countries',
		'Cities',
		'Institutions',
		'CourseParentTypes',
		'CourseTypes',
		'Languages',
		'CourseDurationUnits',
		'Disciplines',
		'TadirahTechniques',
		'TadirahObjects'
	];
    
    
    public function index() {
     	$query = $this->Courses->find('all', array(
        	'contain' => $this->_containments,
			'conditions' => $this->Courses->getFilter($this->request)
		));
	
		$courses = $query->toList();
		
		$this->set('courses', $courses);
        $this->set('_serialize', 'courses');
    }
    
    
    public function count() {
		$query = $this->Courses->find('all', array(
			'contain' => $this->_containments,
			'conditions' => $this->Courses->getFilter($this->request)
		));
		
		$result = ['course_count' => $query->count()];
		
		$this->set('count', $result);
		$this->set('_serialize', 'count');
	}
    
    
    private function _getFilter() {
		$filter = $this->request->getQuery();
		$conditions = ['Courses.active' => true];
		foreach($filter as $key => $value) {
			if(!in_array($key, $this->_allowedFilters)) {
				unset($filter[$key]);
				continue;
			}
			if(is_string($value) AND strpos($value, ',') !== false) {
				$value = explode(',', $value);
				$value = array_filter($value);	// remove empty elements & non-digits
				$value = array_filter($value, function($v) { return ctype_digit($v) AND $v > 0; });
			}
			switch($key) {
				case 'recent':
					if($value == true || $value === '') {
						$conditions['Courses.deleted'] = false;
						$conditions['Courses.updated >'] = date('Y-m-d H:i:s', time() - 60*60*24*489);
					}
					break;
				case 'discipline_id':
				case 'tadirah_object_id':
				case 'tadirah_technique_id':
					break;
				default:
					$conditions['Courses.'.$key] = $value;
			}
		}
		
		return $conditions;
	}

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $course = $this->Courses->get($id, [
			'contain' => $this->_containments,
			'conditions' => [
				//'Courses.id' => $id,
				'Courses.active' => true
			]
		]);
        
        if(empty($course)) {
			throw new RecordNotFoundException();
		}
        
        $this->set('course', $course);
		$this->set('_serialize', 'course');
    }

    
}
