<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Report
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Report', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->belongsTo('profilePic',[
            'className' => 'Uploads',
            'propertyName' => 'profile_pic',
            'foreignKey'=> 'id'
        ]);
        
        $this->belongsTo('signPic',[
            'propertyName' => 'sign_pic',
            'className' => 'Uploads',
            'foreignKey' => 'id'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('home_num');

        $validator
            ->allowEmpty('hp_num');

        $validator
            ->allowEmpty('block');

        $validator
            ->allowEmpty('lvl');
        
        $validator
            ->allowEmpty('profile_pic');

        $validator
            ->allowEmpty('sign_pic');

        $validator
            ->allowEmpty('token');

        $validator
            ->dateTime('token_expires')
            ->allowEmpty('token_expires');

        $validator
            ->allowEmpty('api_token');

        $validator
            ->dateTime('activation_date')
            ->allowEmpty('activation_date');

        $validator
            ->boolean('approved')
            ->allowEmpty('approved');

        $validator
            ->integer('active')
            ->allowEmpty('active');

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role');


        return $validator;
    }
	
	public function validationLoginApi(Validator $validator)
    {
        $validator
            ->email('email', 'Please provide a valid email address.')
            ->requirePresence('email', 'create', 'This is required parameter.')
            ->notEmpty('email', 'Email address is required');
 
        $validator
            ->requirePresence('password', 'create', 'This is required parameter.')
            ->notEmpty('password', 'Password is required.');
 
        return $validator;
    }
	
	public function beforeSave($event, $entity, $options)
    {
        if (isset($entity->password)) {
            $entity->password = (new DefaultPasswordHasher)->hash($entity->password);
        }
 
        return true;
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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}