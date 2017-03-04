<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Upload Entity
 *
 * @property string $id
 * @property string $property
 * @property string $file
 * @property string $file_dir
 * @property string $file_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $foreign_id
 *
 * @property \App\Model\Entity\User $user
 */
class Upload extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
