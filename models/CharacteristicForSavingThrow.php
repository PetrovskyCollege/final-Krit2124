<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristic_for_saving_throw".
 *
 * @property int $id
 * @property string $characteristic
 *
 * @property NpcHasSavingThrow[] $npcHasSavingThrows
 */
class CharacteristicForSavingThrow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristic_for_saving_throw';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['characteristic'], 'required'],
            [['characteristic'], 'string', 'max' => 31],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'characteristic' => 'Characteristic',
        ];
    }

    /**
     * Gets query for [[NpcHasSavingThrows]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSavingThrows()
    {
        return $this->hasMany(NpcHasSavingThrow::class, ['id_characteristic' => 'id']);
    }
}
