<?php
namespace Elaporan\Model\Table;

use Elaporan\Model\Entity\Srk;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Srk Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Upk
 * @property \Cake\ORM\Association\HasMany $Report
 */
class SrkTable extends Table
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

        $this->table('srk');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Upk', [
            'foreignKey' => 'upk_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Report', [
            'foreignKey' => 'srk_id'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
        
        $validator->add('password2',
        'compareWith', [
            'rule' => ['compareWith', 'password'],
            'message' => 'Passwords not equal.'
        ]);

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['upk_id'], 'Upk'));
        return $rules;
    }

}
