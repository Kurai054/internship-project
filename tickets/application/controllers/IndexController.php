<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $registry = Zend_Registry::getInstance();
		$this->_em = $registry->entitymanager;
    }

    public function indexAction()
    {
		$em = $this->_em;
		
		$query_t = $em->createQuery('SELECT t FROM Default_Model_Ticket t');
		$tickets = $query_t->getResult();
		
		$this->view->tickets = $tickets;
		
    }

    public function newAction()
    {
		$form = new Application_Form_Ticket();
		$form->submit->setLabel('Add');
		$this->view->form = $form;

		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {
				$name = $form->getValue('name');
				$user = $form->getValue('user');
				$category = $form->getValue('category');
				$priority = $form->getValue('priority');
				$content = $form->getValue('content');
				
				$created = new DateTime();
				
				$em = $this->_em;
				
				$t = new Default_Model_Ticket;
				$t->setName($name);
				$t->setUser($user);
				$t->setCategory($category);
				$t->setPriority($priority);
				$t->setCreated($created);
				$t->setContent($content);
				
				$em->persist($t);
				$em->flush();
				
				$this->_helper->redirector('index');
			} else {
				$form->populate($formData);
			}
		}
    }

    public function closeAction()
    {
		$id = $this->getRequest()->getParam('id');
		$t = $this->_em->find('Default_Model_Ticket', $id);
		
		if ($this->getRequest()->isPost()) {
			$close = $this->getRequest()->getPost('close');
			if ($close == 'Yes') {
				$closed = 1;
				$em = $this->_em;
				
				$t->setClosed($closed);
				
				$em->persist($t);
				$em->flush();
			}
		$this->_helper->redirector('index');
		} else {
			$this->view->ticket = $t;
		}
    }
	

    public function commentAction()
    {
        $form = new Application_Form_Comment();
		$form->submit->setLabel('Add');
		$this->view->form = $form;
		
		$em = $this->_em;
		
		$ticket_id = $this->getRequest()->getParam('id');
		$ticket = $em->find('Default_Model_Ticket', $ticket_id);
		
		$comments = $ticket->getComments();
		$this->view->comments = $comments;
		
		if ($this->getRequest()->isPost()) {
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {	
				$user = $form->getValue('user');
				$content = $form->getValue('content');
				
				$posted = new DateTime();
				
				$c = new Default_Model_Comment;
				$c->setUser($user);
				$c->setPosted($posted);
				$c->setContent($content);
				$c->setTicket($ticket);
				
				$em->persist($c);
				$em->flush();
				
				$this->_helper->redirector('index');
			} else {
				$form->populate($formData);
			}
		}
    }
}









