<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skill_type".
 *
 * @property int $id
 * @property string $type
 *
 * @property NpcHasSkill[] $npcHasSkills
 */
class SkillType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skill_type';
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
            'type' => 'Навык',
        ];
    }

    /**
     * Gets query for [[NpcHasSkills]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcHasSkills()
    {
        return $this->hasMany(NpcHasSkill::class, ['id_skill_type' => 'id']);
    }
}
