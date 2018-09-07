<?php

namespace app\modules\api\v0\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $TeacherName
 * @property int $Gender 性别：0 is 未知，1 is 男，2 is 女
 * @property string $TelPhone
 * @property string $Email
 * @property string $OfficeAddress 办公地址
 * @property int $CollegeID
 * @property string $TeacherPortrait
 * @property string $Level
 * @property int $DeleteStatus 删除位：0 is 正常，1 is 已删除
 *
 * @property Course[] $courses
 * @property College $college
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Gender', 'CollegeID', 'DeleteStatus'], 'integer'],
            [['TeacherName', 'TelPhone', 'Email', 'OfficeAddress', 'TeacherPortrait'], 'string', 'max' => 255],
            [['Level'], 'string', 'max' => 45],
            [['CollegeID'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['CollegeID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TeacherName' => 'Teacher Name',
            'Gender' => '性别：0 is 未知，1 is 男，2 is 女',
            'TelPhone' => 'Tel Phone',
            'Email' => 'Email',
            'OfficeAddress' => '办公地址',
            'CollegeID' => 'College ID',
            'TeacherPortrait' => 'Teacher Portrait',
            'Level' => 'Level',
            'DeleteStatus' => '删除位：0 is 正常，1 is 已删除',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['TeacherID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'CollegeID']);
    }
}
