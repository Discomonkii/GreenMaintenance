<?php
// app/Model/User.php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {


    public $name = 'User';
	
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Veuillez entre un nom d\'utilisateur svp!'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un mot de passe est nécessaire!'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'utilisateur')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

	
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}



}
?>