<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_sense".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_sense_type
 * @property int $distance Дистанция действия чувства
 *
 * @property Npc $npc
 * @property SenseType $senseType
 */
class NpcHasSense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_sense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_sense_type', 'distance'], 'required'],
            [['id_npc', 'id_sense_type', 'distance'], 'integer'],
            [['id_sense_type'], 'exist', 'skipOnError' => true, 'targetClass' => SenseType::class, 'targetAttribute' => ['id_sense_type' => 'id']],
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
            'id_sense_type' => 'Вид чувства',
            'distance' => 'Дистанция (фт.)',
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
     * Gets query for [[SenseType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSenseType()
    {
        return $this->hasOne(SenseType::class, ['id' => 'id_sense_type']);
    }
}
