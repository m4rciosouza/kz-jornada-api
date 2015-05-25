<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "gps".
 *
 * @property integer $id_gps
 * @property integer $id_usuario
 * @property string $data
 * @property string $latlong
 */
class Gps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'latlong'], 'required'],
            [['id_usuario'], 'integer'],
            [['data'], 'safe'],
            [['latlong'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gps' => Yii::t('gps', 'Id Gps'),
            'id_usuario' => Yii::t('gps', 'Id Usuario'),
            'data' => Yii::t('gps', 'Data'),
            'latlong' => Yii::t('gps', 'Latlong'),
        ];
    }
}
