<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "damage_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property NpcHasDamageImmunity[] $npcHasDamageImmunities
 * @property NpcHasDamageResistance[] $npcHasDamageResistances
 * @property NpcHasDamageVulnerability[] $npcHasDamageVulnerabilities
 */
class DamageType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'damage_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 31],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Вид',
        ];
    }

    /**
     * Gets query for [[NpcHasDamageImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageImmunities()
    {
        return $this->hasMany(NpcHasDamageImmunity::class, ['id_damage_type' => 'id']);
    }

    /**
     * Gets query for [[NpcHasDamageResistances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageResistances()
    {
        return $this->hasMany(NpcHasDamageResistance::class, ['id_damage_type' => 'id']);
    }

    /**
     * Gets query for [[NpcHasDamageVulnerabilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasDamageVulnerabilities()
    {
        return $this->hasMany(NpcHasDamageVulnerability::class, ['id_damage_type' => 'id']);
    }
}
