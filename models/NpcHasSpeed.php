<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_speed".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_speed_type
 * @property int $value Скорость
 *
 * @property Npc $npc
 * @property SpeedType $speedType
 */
class NpcHasSpeed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_speed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_speed_type', 'value'], 'required'],
            [['id_npc', 'id_speed_type', 'value'], 'integer'],
            [['id_npc'], 'exist', 'skipOnError' => true, 'targetClass' => Npc::class, 'targetAttribute' => ['id_npc' => 'id']],
            [['id_speed_type'], 'exist', 'skipOnError' => true, 'targetClass' => SpeedType::class, 'targetAttribute' => ['id_speed_type' => 'id']],
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
            'id_speed_type' => 'Вид скорости',
            'value' => 'Значение скорости (фт.)',
        ];
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

    /**
     * Gets query for [[SpeedType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeedType()
    {
        return $this->hasOne(SpeedType::class, ['id' => 'id_speed_type']);
    }
}
