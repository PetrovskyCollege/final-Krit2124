<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_damage_immunity".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_damage_type
 *
 * @property DamageType $damageType
 * @property Npc $npc
 */
class NpcHasDamageImmunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_damage_immunity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_damage_type'], 'required'],
            [['id_npc', 'id_damage_type'], 'integer'],
            [['id_damage_type'], 'exist', 'skipOnError' => true, 'targetClass' => DamageType::class, 'targetAttribute' => ['id_damage_type' => 'id']],
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
            'id_damage_type' => 'Вид урона',
        ];
    }

    /**
     * Gets query for [[DamageType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDamageType()
    {
        return $this->hasOne(DamageType::class, ['id' => 'id_damage_type']);
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
