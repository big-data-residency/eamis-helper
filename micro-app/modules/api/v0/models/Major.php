<?php

namespace app\modules\api\v0\models;

use Yii;

/**
 * This is the model class for table "major".
 *
 * @property int $id
 * @property string $majorName
 * @property int $collegeId
 * @property int $deleteStatus 删除位
 *
 * @property Course[] $courses
 * @property College $college
 * @property Student[] $students
 * @property Student[] $students0
 */
class Major extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'major';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['collegeId', 'deleteStatus'], 'integer'],
            [['majorName'], 'string', 'max' => 255],
            [['collegeId'], 'exist', 'skipOnError' => true, 'targetClass' => College::className(), 'targetAttribute' => ['collegeId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'majorName' => 'Major Name',
            'collegeId' => 'College ID',
            'deleteStatus' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['MajorID' => 'id'])->inverseOf('major');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::className(), ['id' => 'collegeId'])->inverseOf('majors');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['majorId' => 'id'])->inverseOf('major');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents0()
    {
        return $this->hasMany(Student::className(), ['extraMajorId' => 'id'])->inverseOf('extraMajor');
    }
}
