<?php
class BootStrap{
	
	public $messages = array();
	private $types = array('primary','secondary','success','danger','warning','info','light','dark');
	
	public function setMessage(String $type, String $message){
		if(in_array($type,$this->types)){
			$this->messages[] = array($type, $message); 
		}
	}
	public function getMessages(){
		foreach ($this->messages as $message) {
			echo '<div class="alert alert-' . $message[0] . '" role="alert">' .  $message[1]. '</Strong></div>';
		}
	}
}
