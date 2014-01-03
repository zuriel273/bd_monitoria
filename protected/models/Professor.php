<?php

/**
 * This is the model class for table "professor".
 *
 * The followings are the available columns in table 'professor':
 * @property integer $id
 * @property integer $departamento_id_departamento
 *
 * The followings are the available model relations:
 * @property Monitoria[] $monitorias
 * @property Pessoa[] $pessoas
 * @property Departamento $departamentoIdDepartamento
 * @property Projetodemonitoria[] $projetodemonitorias
 */
class Professor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'professor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('departamento_id_departamento', 'required'),
			array('departamento_id_departamento', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, departamento_id_departamento', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'monitorias' => array(self::HAS_MANY, 'Monitoria', 'professor_id_professor'),
			'pessoas' => array(self::HAS_MANY, 'Pessoa', 'professor_id_professor'),
			'departamentoIdDepartamento' => array(self::BELONGS_TO, 'Departamento', 'departamento_id_departamento'),
			'projetodemonitorias' => array(self::HAS_MANY, 'Projetodemonitoria', 'professor_id_professor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'departamento_id_departamento' => 'Departamento Id Departamento',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('departamento_id_departamento',$this->departamento_id_departamento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public function cadastroProfessor($pessoa)
        {
            
            $sql = " INSERT INTO `professor`( `curso`, `ano_ingresso`, `banco`, `agencia`, `cc`, `historico`)  
                     VALUES ($pessoa->curso,$pessoa->ano_ingresso,$pessoa->banco,$pessoa->agencia,$pessoa->cc,$pessoa->historico)";
       //   dd($sql);
            $comando = Yii::app()->db->createCommand($sql);   
            $comando->execute();
        }
        
        public function procuraIdDepartamento($professor){
                       
          $sql = "SELECT id FROM `aluno` WHERE agencia = $professor->agencia and cc = $professor->cc";
         // dd($sql); 
          $comando = Yii::app()->db->createCommand($sql);   
         // $comando->execute();
          //dd($comando); 
          return $comando->queryRow();
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Professor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
