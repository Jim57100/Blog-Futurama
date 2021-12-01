<?php

namespace Core\HTML;

class Form {

  private $data;
  public $surround = 'div';

  public function __construct($data = array())
  {
   $this->data = $data; 
  }

  //div entourant l'input
  private function surround($html) {
    return "<{$this->surround}>{$html}</{$this->surround}>";
  }

  //Index de la valeur à récupérer
  protected function getValue($index) {
    if(is_object($this->data) ) {
      return $this->data->index;
    }
    return isset($this->data[$index]) ? $this->data[$index] : null;
  }

  //input
  public function input($name, $label, $options = []) {
    $type = isset($options['type']) ? $options['type'] : 'text';
    return $this->surround('<input type ="'.$type.'" name="'.$name.'" value"'.$this->getValue($name).'" placeholder="'.$name.'"/>');
  }


  //btn submit
  public function submit() {
    return $this->surround('<button type="submit" class="btn btn-primary" name="submit">Envoyer</button>');
  }

}