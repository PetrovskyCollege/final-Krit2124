<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_condition_immunity".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_condition_type
 *
 * @property ConditionType $conditionType
 * @property Npc $npc
 */
class NpcHasConditionImmunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_condition_immunity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_condition_type'], 'required'],
            [['id_npc', 'id_condition_type'], 'integer'],
            [['id_npc'], 'exist', 'skipOnError' => true, 'targetClass' => Npc::class, 'targetAttribute' => ['id_npc' => 'id']],
            [['id_condition_type'], 'exist', 'skipOnError' => true, 'targetClass' => ConditionType::class, 'targetAttribute' => ['id_condition_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_npc' => 'NPC',
            'id_condition_type' => 'Вид состояния',
        ];
    }

    /**
     * Gets query for [[ConditionType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConditionType()
    {
        return $this->hasOne(ConditionType::class, ['id' => 'id_condition_type']);
    }

    /**
     * Gets query for [[Npc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpc()
    {
        return $this->hasOne(Npc::class, ['id' => 'id_npc']);
    }
}
