<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "habitat_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property NpcHasHabitat[] $npcHasHabitats
 */
class HabitatType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'habitat_type';
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
            'type' => 'Местность',
        ];
    }

    /**
     * Gets query for [[NpcHasHabitats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasHabitats()
    {
        return $this->hasMany(NpcHasHabitat::class, ['id_habitat_type' => 'id']);
    }
}
