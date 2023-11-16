<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sense_type".
 *
 * @property int $id
 * @property string $type Название чувства
 *
 * @property NpcHasSense[] $npcHasSenses
 */
class SenseType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sense_type';
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
     * Gets query for [[NpcHasSenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSenses()
    {
        return $this->hasMany(NpcHasSense::class, ['id_sense_type' => 'id']);
    }
}
