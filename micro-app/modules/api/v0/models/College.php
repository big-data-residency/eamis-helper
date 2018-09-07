<?php

namespace app\modules\api\v0\models;

use Yii;

/**
 * This is the model class for table "college".
 *
 * @property int $id
 * @property string $collegeName
 * @property int $type 学院分类 1234=文理工商
 * @property int $deleteStatus 删除位
 *
 * @property Course[] $courses
 * @property Major[] $majors
 * @property Teacher[] $teachers
 */
class College extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'college';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'deleteStatus'], 'integer'],
            [['collegeName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'collegeName' => 'College Name',
            'type' => 'Type',
            'deleteStatus' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['CollegeID' => 'id'])->inverseOf('college');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajors()
    {
        return $this->hasMany(Major::className(), ['collegeId' => 'id'])->inverseOf('college');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['CollegeID' => 'id'])->inverseOf('college');
    }
}
