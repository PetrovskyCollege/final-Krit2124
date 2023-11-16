<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "condition_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property NpcHasConditionImmunity[] $npcHasConditionImmunities
 */
class ConditionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condition_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255],
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
     * Gets query for [[NpcHasConditionImmunities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasConditionImmunities()
    {
        return $this->hasMany(NpcHasConditionImmunity::class, ['id_condition_type' => 'id']);
    }
}
