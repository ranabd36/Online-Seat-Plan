<?php
namespace App\Model\Table;

use App\Model\Entity\Column;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Columns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rooms
 */
class ColumnsTable extends Table
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

        $this->table('columns');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id',
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
            ->add('capacity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('capacity', 'create')
            ->notEmpty('capacity');

        $validator
            ->add('is_complete', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_complete');

        $validator
            ->add('name', 'valid', ['rule' => 'numeric'])
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['room_id'], 'Rooms'));
        return $rules;
    }
}
