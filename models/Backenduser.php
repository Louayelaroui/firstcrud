<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backenduser".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $username
 * @property string|null $password
 * @property string|null $authkey
 */
class Backenduser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backenduser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'password', 'authkey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'authkey' => Yii::t('app', 'Authkey'),
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public static function findByUsername($username){

        return self::findOne(['username'=>$username]);
    }
}
