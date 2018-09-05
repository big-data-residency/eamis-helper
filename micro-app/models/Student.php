<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $studentName
 * @property int $gender 性别：0 is 未知，1 is 男，2 is 女
 * @property string $nickName
 * @property string $password
 * @property string $studentNumber
 * @property int $grade
 * @property int $majorId
 * @property int $hasExtraMajor 是否双辅修：0 is 否，1 is 辅修，2 is 双休
 * emmm不允许三修，三修你妹
 * 这里的双辅修是指原本单专业，然后申请双辅修的，向信安法、经管法这种多学位班认为仍然是一个专业，并未双辅修
 * @property int $extraMajorId
 * @property string $avatarPath
 * @property int $points 用户积分
 * @property int $privilege 0=普通用户 1=管理员
 * @property string $authKey
 * @property string $access_token
 * @property int $deleteStatus 删除位：0 is 正常，1 is 已删除
 *
 * @property File[] $files
 * @property Major $major
 * @property Major $extraMajor
 * @property StudentSelectCourse[] $studentSelectCourses
 */
class Student extends ActiveRecord implements Linkable, IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'grade', 'majorId', 'hasExtraMajor', 'extraMajorId', 'points', 'privilege', 'deleteStatus'], 'integer'],
            [['studentNumber'], 'required'],
            [['studentName', 'nickName', 'password', 'studentNumber', 'avatarPath', 'authKey', 'access_token'], 'string', 'max' => 255],
            [['majorId'], 'exist', 'skipOnError' => true, 'targetClass' => Major::className(), 'targetAttribute' => ['majorId' => 'id']],
            [['extraMajorId'], 'exist', 'skipOnError' => true, 'targetClass' => Major::className(), 'targetAttribute' => ['extraMajorId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'studentName' => 'Student Name',
            'gender' => 'Gender',
            'nickName' => 'Nick Name',
            'password' => 'Password',
            'studentNumber' => 'Student Number',
            'grade' => 'Grade',
            'majorId' => 'Major ID',
            'hasExtraMajor' => 'Has ExtraMajor',
            'extraMajorId' => 'Extra Major ID',
            'avatarPath' => 'Avatar Path',
            'points' => 'Points',
            'privilege' => 'Privilege',
            'authKey' => 'AuthKey',
            'access_token' => 'Access Token',
            'deleteStatus' => 'Delete Status',
        ];
    }

    /**
     * Control the columns to return
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['password']);
        unset($fields['authKey']);
        unset($fields['access_token']);
        unset($fields['deleteStatus']);

        return ArrayHelper::merge($fields,
            [
                'privilege' => function ($model) {
                    return $model->privilege == 1 ? 'admin' : 'student';
                },
                'majorName' => function ($model) {
                    return $model->major->majorName;
                },
                'collegeName' => function ($model) {
                    return $model->major->college->collegeName;
                },
                'gender' => function ($model) {
                    return $model->gender == 1 ? '男' : '女';
                }
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['StudentID' => 'id'])->inverseOf('student');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['id' => 'majorId'])->inverseOf('students');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExtraMajor()
    {
        return $this->hasOne(Major::className(), ['id' => 'extraMajorId'])->inverseOf('students0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSelectCourses()
    {
        return $this->hasMany(StudentSelectCourse::className(), ['StudentID' => 'id'])->inverseOf('student');
    }

    /**
     * {@inheritdoc}
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to('student/' . $this->id, false),
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'auth_key' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key'
                ],
                'value' => \Yii::$app->getSecurity()->generateRandomString(),
            ],
            'access_token' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'access_token',
                ],
                'value' => \Yii::$app->getSecurity()->generateRandomString()
            ],

        ];
    }

}
