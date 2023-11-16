<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npc_has_language".
 *
 * @property int $id
 * @property int $id_npc
 * @property int $id_language
 *
 * @property Language $language
 * @property Npc $npc
 */
class NpcHasLanguage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npc_has_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_npc', 'id_language'], 'required'],
            [['id_npc', 'id_language'], 'integer'],
            [['id_language'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['id_language' => 'id']],
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
            'id_language' => 'Язык',
        ];
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::class, ['id' => 'id_language']);
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
