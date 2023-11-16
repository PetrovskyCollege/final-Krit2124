<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_skill".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_skill_type
 * @property float $multiplier Модификатор навыка (значение, на которое умножается бонус мастерства)
 *
 * @property Npc $npc
 * @property SkillType $skillType
 */
class NpcHasSkill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_skill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_skill_type', 'multiplier'], 'required'],
            [['id_npc', 'id_skill_type'], 'integer'],
            [['multiplier'], 'number'],
            [['id_npc'], 'exist', 'skipOnError' => true, 'targetClass' => Npc::class, 'targetAttribute' => ['id_npc' => 'id']],
            [['id_skill_type'], 'exist', 'skipOnError' => true, 'targetClass' => SkillType::class, 'targetAttribute' => ['id_skill_type' => 'id']],
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
            'id_skill_type' => 'Навык',
            'multiplier' => 'Множитель бонуса мастерства',
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
     * Gets query for [[SkillType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSkillType()
    {
        return $this->hasOne(SkillType::class, ['id' => 'id_skill_type']);
    }
}
