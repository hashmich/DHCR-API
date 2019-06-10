<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TadirahTechniques Model
 *
 * @property \App\Model\Table\CoursesTable|\Cake\ORM\Association\BelongsToMany $Courses
 * @property \App\Model\Table\TadirahActivitiesTable|\Cake\ORM\Association\BelongsToMany $TadirahActivities
 *
 * @method \App\Model\Entity\TadirahTechnique get($primaryKey, $options = [])
 * @method \App\Model\Entity\TadirahTechnique newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TadirahTechnique[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TadirahTechnique|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TadirahTechnique saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TadirahTechnique patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TadirahTechnique[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TadirahTechnique findOrCreate($search, callable $callback = null, $options = [])
 */
class TadirahTechniquesTable extends Table
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

        $this->setTable('tadirah_techniques');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Courses', [
            'foreignKey' => 'tadirah_technique_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_tadirah_techniques'
        ]);
        $this->belongsToMany('TadirahActivities', [
            'foreignKey' => 'tadirah_technique_id',
            'targetForeignKey' => 'tadirah_activity_id',
            'joinTable' => 'tadirah_activities_tadirah_techniques'
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
