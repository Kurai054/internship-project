<?php

/**
 * @Entity @Table(name="comments")
 */
class Default_Model_Comment
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $id;
	
	/**  @ManyToOne(targetEntity="Default_Model_Ticket", inversedBy="id") */
	private $ticket = null;
	
	/** @Column(type="string") */
	private $user;
	
	/** @Column(type="datetime") */
	private $posted;
	
	/** @Column(type="string") */
	private $content;
	
	public function setUser($user) {
        $this->user = $user;
        return true;
    }
	
	public function setPosted($posted) {
        $this->posted = $posted;
        return true;
    }
	
	public function setContent($content) {
        $this->content = $content;
        return true;
    }
	
	public function setTicket($ticket) {
		$this->ticket = $ticket;
		return true;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getTicket() {
		return $this->ticket;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function getPosted() {
		return $this->posted;
	}
	
	public function getContent() {
		return $this->content;
	}
}