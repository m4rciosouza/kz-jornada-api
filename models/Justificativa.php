<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "justificativa".
 *
 * @property integer $id
 * @property string $descricao
 */
class Justificativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'justificativa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('justificativa', 'ID'),
            'descricao' => Yii::t('justificativa', 'Justificativa'),
        ];
    }
}
