<?php
namespace Elaporan\Model\Table;

use Elaporan\Model\Entity\Sick;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sick Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Report
 */
class SickTable extends Table
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

        $this->table('sick');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Report', [
            'foreignKey' => 'report_id',
            'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('datetime', 'valid', ['rule' => 'datetime'])
            ->requirePresence('datetime', 'create')
            ->notEmpty('datetime');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('courseCode', 'create')
            ->notEmpty('courseCode');

        $validator
            ->requirePresence('ic', 'create')
            ->notEmpty('ic');

        $validator
            ->requirePresence('tel', 'create')
            ->notEmpty('tel');

        $validator
            ->requirePresence('studentNo', 'create')
            ->notEmpty('studentNo');

        $validator
            ->requirePresence('notes', 'create')
            ->notEmpty('notes');

        $validator
            ->requirePresence('homeAddress', 'create')
            ->notEmpty('homeAddress');

        $validator
            ->requirePresence('collegeAddress', 'create')
            ->notEmpty('collegeAddress');

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
        $rules->add($rules->existsIn(['report_id'], 'Report'));
        return $rules;
    }
}
