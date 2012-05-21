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
}