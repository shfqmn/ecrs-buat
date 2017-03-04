<?php
namespace Elaporan\Model\Table;

use Elaporan\Model\Entity\Report;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Report Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Problem
 * @property \Cake\ORM\Association\HasMany $Sick
 */
class ReportTable extends Table
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

        $this->table('report');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'srk_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Problem', [
            'foreignKey' => 'report_id'
        ]);
        $this->hasMany('Sick', [
            'foreignKey' => 'report_id'
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
            ->add('reference', 'valid', ['rule' => 'uuid'])
            ->requirePresence('reference', 'create')
            ->notEmpty('reference');

        $validator
            ->allowEmpty('status');

        $validator
            ->allowEmpty('reason');

        $validator
            ->requirePresence('workingDates', 'create')
            ->notEmpty('workingDates');

        $validator
            ->requirePresence('workingTimes', 'create')
            ->notEmpty('workingTimes');

        $validator
            ->requirePresence('last_updated', 'create')
            ->notEmpty('last_updated');

        $validator
            ->add('noProblem', 'valid', ['rule' => 'boolean'])
            ->requirePresence('noProblem', 'create')
            ->notEmpty('noProblem');

        $validator
            ->requirePresence('reportDate', 'create')
            ->notEmpty('reportDate');

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
        $rules->add($rules->existsIn(['srk_id'], 'Users'));
        return $rules;
    }
}
