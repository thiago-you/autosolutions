<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id_cliente
 * @property string $nome
 * @property string $sobrenome
 * @property string $apelido
 * @property string $documento
 * @property string $sexo
 * @property string $data_nascimento
 * @property string $data_cadastro
 * @property string $cep
 * @property string $endereco
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property integer $id_cidade
 * @property integer $id_estado
 * @property string $email
 * @property integer $situacao
 * @property string $tipo
 *
 * @property Telefone[] $telefones
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sobrenome', 'data_cadastro'], 'required'],
            [['sexo'], 'string'],
            [['data_nascimento', 'data_cadastro'], 'safe'],
            [['id_cidade', 'id_estado', 'situacao'], 'integer'],
            [['nome', 'apelido', 'email'], 'string', 'max' => 100],
            [['sobrenome'], 'string', 'max' => 150],
            [['documento'], 'string', 'max' => 14],
            [['cep'], 'string', 'max' => 8],
            [['endereco'], 'string', 'max' => 50],
            [['numero'], 'string', 'max' => 5],
            [['complemento'], 'string', 'max' => 20],
            [['bairro'], 'string', 'max' => 30],
            [['tipo'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Cód.',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'apelido' => 'Apelido',
            'documento' => 'Documento',
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data de Nascimento',
            'data_cadastro' => 'Data de Cadastro',
            'cep' => 'CEP',
            'endereco' => 'Endereço',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'id_cidade' => 'Cidade',
            'id_estado' => 'Estado',
            'email' => 'Email',
            'situacao' => 'Situação',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefones()
    {
        return $this->hasMany(Telefone::className(), ['id_cliente' => 'id_cliente']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        
        $this->data_cadastro = date('Y-m-d');
        
        return true;
    }
}
