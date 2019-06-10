<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TadirahObjects Model
 *
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsToMany $Courses
 *
 * @method \App\Model\Entity\TadirahObject get($primaryKey, $options = [])
 * @method \App\Model\Entity\TadirahObject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TadirahObject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TadirahObject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TadirahObject saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TadirahObject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TadirahObject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TadirahObject findOrCreate($search, callable $callback = null, $options = [])
 */
class TadirahObjectsTable extends Table
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

        $this->setTable('tadirah_objects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Courses', [
            'foreignKey' => 'tadirah_object_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_tadirah_objects'
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
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
