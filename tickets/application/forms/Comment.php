<?php

class Application_Form_Comment extends Zend_Form
{

    public function init()
    {
        $this->setName('comment');
		
		$id = new Zend_Form_Element_Hidden('id');
		$id->addFilter('Int');
		
		$ticket_id = new Zend_Form_Element_Hidden('ticket_id');
		$ticket_id->addFilter('Int');
		
		$user = new Zend_Form_Element_Text('user');
		$user->setLabel('User')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
		$content = new Zend_Form_Element_TextArea('content');
		$content->setLabel('Content')
			->setRequired(true)
			->addFilter('StripTags')
			->addFilter('StringTrim')
			->addValidator('NotEmpty');
			
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$this->addElements(array($id, $ticket_id, $user, $content, $submit));
    }


}

