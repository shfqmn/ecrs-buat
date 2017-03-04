<?php
namespace Elaporan\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity.
 *
 * @property int $id
 * @property string $reference
 * @property string $reportDate
 * @property int $srk_id
 * @property \App\Model\Entity\Srk $srk
 * @property string $status
 * @property string $reason
 * @property string $workingDates
 * @property string $workingTimes
 * @property \App\Model\Entity\Problem[] $problem
 * @property \App\Model\Entity\Sick[] $sick
 */
class Report extends Entity
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
        'id' => false,
    ];
}
