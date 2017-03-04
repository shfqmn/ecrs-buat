<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uploads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Upload get($primaryKey, $options = [])
 * @method \App\Model\Entity\Upload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Upload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Upload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Upload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Upload findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadsTable extends Table
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

        $this->setTable('uploads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'foreign_id',
            'joinType' => 'INNER'
        ]);
		
		$this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [
                'fields' => [
                    'dir' => 'file_dir',
                    'type'=> 'file_type'
                ],
                'path' => 'img{DS}uploads{DS}{microtime}',
                'filesystem' => [
                    'root' => WWW_ROOT
                ]
            
            ],
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
            ->requirePresence('property', 'create')
            ->allowEmpty('property');

        $validator
            ->requirePresence('file', 'create')
            ->allowEmpty('file');

        $validator
            ->allowEmpty('file_dir');

        $validator
            ->allowEmpty('file_type');
			
		 $validator->provider('upload', \Josegonzalez\Upload\Validation\UploadValidation::class);
        // OR
        $validator->provider('upload', \Josegonzalez\Upload\Validation\ImageValidation::class);
        // OR
        $validator->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);
        
        $validator->add('file', 'fileCompletedUpload', [ 'rule' => 'isCompletedUpload', 'message' => 'This file could not be uploaded completely', 'provider' => 'upload' ]); 
        $validator->add('file', 'fileFileUpload', [ 'rule' => 'isFileUpload', 'message' => 'There was no file found to upload', 'provider' => 'upload' ]); 
        $validator->add('file', 'fileSuccessfulWrite', [ 'rule' => 'isSuccessfulWrite', 'message' => 'This upload failed', 'provider' => 'upload' ]);
        

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
        $rules->add($rules->existsIn(['foreign_id'], 'Users'));

        return $rules;
    }
}