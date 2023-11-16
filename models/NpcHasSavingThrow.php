<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_saving_throw".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_characteristic
 * @property float $multiplier Модификатор спасброска (значение, на которое умножается бонус мастерства)
 *
 * @property CharacteristicForSavingThrow $characteristic
 * @property Npc $npc
 */
class NpcHasSavingThrow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_saving_throw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_characteristic', 'multiplier'], 'required'],
            [['id_npc', 'id_characteristic'], 'integer'],
            [['multiplier'], 'number'],
            [['id_characteristic'], 'exist', 'skipOnError' => true, 'targetClass' => CharacteristicForSavingThrow::class, 'targetAttribute' => ['id_characteristic' => 'id']],
            [['id_npc'], 'exist', 'skipOnError' => true, 'targetClass' => Npc::class, 'targetAttribute' => ['id_npc' => 'id']],
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
            'id_characteristic' => 'Характеристика',
            'multiplier' => 'Множитель бонуса мастерства',
        ];
    }

    /**
     * Gets query for [[Characteristic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(CharacteristicForSavingThrow::class, ['id' => 'id_characteristic']);
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
