<?php

class Application_Form_Ticket extends Zend_Form
{

    public function init()
    {
		$this->setName('ticket');
		
		$id = new Zend_Form_Element_Hidden('id');
		$id->addFilter('Int');
		
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Name')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		
		$user = new Zend_Form_Element_Text('user');
		$user->setLabel('User')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
		$category = new Zend_Form_Element_Select('category');
		$category->setLabel('Category')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		$category->addMultiOptions(array(
        'IT' => 'IT',
        'Logistic' => 'Logistic',
		'Suggestion' => 'Suggestion'
		));
			
		$priority = new Zend_Form_Element_Select('priority');
		$priority->setLabel('Priority')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
		$priority->addMultiOptions(array(
        1 => 'Low',
        2 => 'Medium',
		3 => 'High'
		));
		
		$content = new Zend_Form_Element_TextArea('content');
		$content->setLabel('Content')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');

		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$this->addElements(array($id, $name, $user, $category, $priority, $content, $submit));
    }


}

