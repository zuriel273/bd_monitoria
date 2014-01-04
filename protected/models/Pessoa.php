<?php

/**
 * This is the model class for table "pessoa".
 *
 * The followings are the available columns in table 'pessoa':
 * @property integer $cpf
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $rg
 * @property string $orgao_emissor
 * @property string $endereco
 * @property string $telefone
 * @property integer $tipo
 * @property string $matricula
 * @property integer $professor_id_professor
 * @property integer $aluno_id_aluno
 *
 * The followings are the available model relations:
 * @property Professor $professorIdProfessor
 * @property Aluno $alunoIdAluno
 */
class Pessoa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pessoa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpf', 'required'),
			array('cpf, tipo, professor_id_professor, aluno_id_aluno', 'numerical', 'integerOnly'=>true),
			array('nome, email, endereco, telefone', 'length', 'max'=>45),
			array('senha', 'length', 'max'=>16),
			array('rg', 'length', 'max'=>10),
			array('orgao_emissor', 'length', 'max'=>6),
			array('matricula', 'length', 'max'=>9),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cpf, id, nome, email, senha, rg, orgao_emissor, endereco, telefone, tipo, matricula, professor_id_professor, aluno_id_aluno', 'safe', 'on'=>'search'),
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
			'professorIdProfessor' => array(self::BELONGS_TO, 'Professor', 'professor_id_professor'),
			'alunoIdAluno' => array(self::BELONGS_TO, 'Aluno', 'aluno_id_aluno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cpf' => 'Cpf',
			'id' => 'ID',
			'nome' => 'Nome',
			'email' => 'Email',
			'senha' => 'Senha',
			'rg' => 'Rg',
			'orgao_emissor' => 'Orgao Emissor',
			'endereco' => 'Endereco',
			'telefone' => 'Telefone',
			'tipo' => 'Tipo',
			'matricula' => 'Matricula',
			'professor_id_professor' => 'Professor Id Professor',
			'aluno_id_aluno' => 'Aluno Id Aluno',
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

		$criteria->compare('cpf',$this->cpf);
		$criteria->compare('id',$this->id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('senha',$this->senha,true);
		$criteria->compare('rg',$this->rg,true);
		$criteria->compare('orgao_emissor',$this->orgao_emissor,true);
		$criteria->compare('endereco',$this->endereco,true);
		$criteria->compare('telefone',$this->telefone,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('matricula',$this->matricula,true);
		$criteria->compare('professor_id_professor',$this->professor_id_professor);
		$criteria->compare('aluno_id_aluno',$this->aluno_id_aluno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pessoa the static model class
	 */
        
        public function cadastroPessoa(Pessoa $pessoa, $id_aluno)
        {
            $sql = "INSERT INTO `pessoa`(`cpf`, `nome`, `email`, `senha`, `rg`, `orgao_emissor`, `endereco`, `telefone`, `tipo`, `matricula`,`aluno_id_aluno`) 
                     VALUES ($pessoa->cpf,$pessoa->nome,$pessoa->email,$pessoa->senha,$pessoa->rg,$pessoa->orgao_emissor,$pessoa->endereco,$pessoa->telefone,$pessoa->tipo,$pessoa->matricula, $id_aluno)";
                   
            $comando = Yii::app()->db->createCommand($sql);   
            $comando->execute();
        }

        public function buscaPessoa($pessoa ){
            $sql="SELECT * FROM `pessoa` WHERE nome like $pessoa %";
            
            $comando = Yii::app()->db->createCommand($sql);   
         // $comando->execute();
          //dd($comando); 
          return $comando->queryRow();
                    
                    
        }

        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
