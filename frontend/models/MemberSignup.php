<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Member;

/**
 * Signup form
 */
class MemberSignup extends Model
{
    public $username;
   // public $email;
    public $password;
    public $confirm_password;

   // public $phone;
    //public $identity_card;
   // public $address;
    public $fistname;
    public $lastname;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Member', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
			/*
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Member', 'message' => 'This email address has already been taken.'],
			*/
            [['password','confirm_password'], 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            [['fistname','lastname'],'string']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            return null;
           
        }
        
        $user = new Member();
        
        $user->username = $this->username;
         $user->created_at=time();
        //$user->phone= $this->phone;
        $user->status=1;
       // $user->address=$this->address;
       // $user->so_cmt= $this->identity_card;
      //  $user->email = $this->email;
        $user->fistname = $this->fistname;
        $user->lastname = $this->lastname;
        $user->setPassword($this->password);
       
        $user->generateAuthKey();        
        return $user->save() ? $user : null;
       
    }
}
