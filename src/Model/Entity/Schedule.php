<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity.
 *
 * @property int $id
 * @property int $course_id
 * @property \App\Model\Entity\Course $course
 * @property int $room_id
 * @property \App\Model\Entity\Room $room
 * @property string $semester
 * @property string $exam_type
 * @property int $date
 * @property string $slot
 */
class Schedule extends Entity
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
