<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseTypes Model
 *
 * @property \App\Model\Table\CourseParentTypesTable|\Cake\ORM\Association\BelongsTo $CourseParentTypes
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\HasMany $Courses
 *
 * @method \App\Model\Entity\CourseType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CourseType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CourseType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CourseType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseType findOrCreate($search, callable $callback = null, $options = [])
 */
class CourseTypesTable extends Table
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

        $this->setTable('course_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('CourseParentTypes', [
            'foreignKey' => 'course_parent_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Courses', [
            'foreignKey' => 'course_type_id'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['course_parent_type_id'], 'CourseParentTypes'));

        return $rules;
    }
}
