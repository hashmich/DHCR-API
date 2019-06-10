<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseParentTypes Model
 *
 * @property \App\Model\Table\CourseTypesTable|\Cake\ORM\Association\HasMany $CourseTypes
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\HasMany $Courses
 *
 * @method \App\Model\Entity\CourseParentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CourseParentType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CourseParentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseParentType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseParentType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseParentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CourseParentType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseParentType findOrCreate($search, callable $callback = null, $options = [])
 */
class CourseParentTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('course_parent_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CourseTypes', [
            'foreignKey' => 'course_parent_type_id'
        ]);
        $this->hasMany('Courses', [
            'foreignKey' => 'course_parent_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        return $validator;
    }
}
