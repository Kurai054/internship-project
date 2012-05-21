<?php
 
/**
 * @Entity
 * @Table(name="tickets")
 */
class Default_Model_Ticket
{
    /** @Id @Column(type="integer") @GeneratedValue */
	private $id;
	
	/** @Column(type="string") */
	private $name;
	
	/** @Column(type="datetime") */
	private $created;
	
	/** @Column(type="integer") */
	private $priority;
	
	/** @OneToMany(targetEntity="Default_Model_Comment", mappedBy="ticket")
	*	@var Comment[]
	*/
	private $comments = null;
	
	/** @Column(type="string") */
	private $category;
	
	/** @Column(type="boolean", nullable=true) */
	private $closed;
	
	/** @Column(type="string") */
	private $user;
	
	/** @Column(type="string") */
	private $content;
 
    public function setName($string) {
        $this->name = $string;
        return true;
    }
	
	public function setCreated($created) {
		$this->created = $created;
		return true;
	}
	
	public function setPriority($priority) {
		$this->priority = $priority;
		return true;
	}
	
	public function setCategory($category) {
		$this->category = $category;
		return true;
	}
	
	public function setClosed($closed) {
		$this->closed = $closed;
		return true;
	}
	
	public function setUser($user) {
		$this->user = $user;
		return true;
	}
	
	public function setContent($content) {
		$this->content = $content;
		return true;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getCreated() {
		return $this->created;
	}
	
	public function getCategory() {
		return $this->category;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function getClosed() {
		return $this->closed;
	}
	
	public function getUser() {
		return $this->user;
	}
	
	public function getContent() {
		return $this->content;
	}
}