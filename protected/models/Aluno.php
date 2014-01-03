<?php

/**
 * This is the model class for table "aluno".
 *
 * The followings are the available columns in table 'aluno':
 * @property integer $id
 * @property string $curso
 * @property string $ano_ingresso
 * @property integer $banco
 * @property integer $agencia
 * @property integer $cc
 * @property string $historico
 *
 * The followings are the available model relations:
 * @property Monitoria[] $monitorias
 * @property Pessoa[] $pessoas
 */
class Aluno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('banco, agencia, cc', 'numerical', 'integerOnly'=>true),
			array('curso', 'length', 'max'=>45),
			array('ano_ingresso', 'length', 'max'=>5),
			array('historico', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, curso, ano_ingresso, banco, agencia, cc, historico', 'safe', 'on'=>'search'),
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
			'monitorias' => array(self::HAS_MANY, 'Monitoria', 'aluno_id_aluno'),
			'pessoas' => array(self::HAS_MANY, 'Pessoa', 'aluno_id_aluno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			//'id' => 'ID',
			'curso' => 'Curso',
			'ano_ingresso' => 'Ano de Ingresso',
			'banco' => 'Banco',
			'agencia' => 'Agencia',
			'cc' => 'Conta Corrente',
			'historico' => 'Historico',
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
		$criteria->compare('curso',$this->curso,true);
		$criteria->compare('ano_ingresso',$this->ano_ingresso,true);
		$criteria->compare('banco',$this->banco);
		$criteria->compare('agencia',$this->agencia);
		$criteria->compare('cc',$this->cc);
		$criteria->compare('historico',$this->historico,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
         public function cadastroAluno($pessoa)
        {
            
            $sql = " INSERT INTO `aluno`( `curso`, `ano_ingresso`, `banco`, `agencia`, `cc`, `historico`)  
                     VALUES ($pessoa->curso,$pessoa->ano_ingresso,$pessoa->banco,$pessoa->agencia,$pessoa->cc,$pessoa->historico)";
       //   dd($sql);
            $comando = Yii::app()->db->createCommand($sql);   
            $comando->execute();
        }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aluno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
