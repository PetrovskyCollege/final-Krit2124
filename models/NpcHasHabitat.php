<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_habitat".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_habitat_type
 *
 * @property HabitatType $habitatType
 * @property Npc $npc
 */
class NpcHasHabitat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_habitat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_habitat_type'], 'required'],
            [['id_npc', 'id_habitat_type'], 'integer'],
            [['id_habitat_type'], 'exist', 'skipOnError' => true, 'targetClass' => HabitatType::class, 'targetAttribute' => ['id_habitat_type' => 'id']],
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
            'id_habitat_type' => 'Место обитания',
        ];
    }

    /**
     * Gets query for [[HabitatType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitatType()
    {
        return $this->hasOne(HabitatType::class, ['id' => 'id_habitat_type']);
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
