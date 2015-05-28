<?php

class Crudimage extends \Eloquent {
	public static function valid($id='') {
      return array(
        'title' => 'required'.($id ? ",$id" : '')
      );
    }
}