<?php

require_once ("Model.php");

class Comment extends Model {
	private $id;
	private $comment;
	private $author;
	private $comment_date;
	private $post_id;

	/*
	function __construct(argument)
	{
		# code...
	}*/

// GETTER

	/**
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

	/**
     * @return $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
	/**
     * @return $comment_date
     */
    public function getComment_date()
    {
        return $this->comment_date;
    }
	/**
     * @return $post_id
     */
    public function getPost_id()
    {
        return $this->post_id;
    }


//SETTERS

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

	/**
     * @param mixed $comment
     *
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param mixed $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @param mixed $comment_date
     *
     * @return self
     */
    public function setComment_date($comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    /**
     * @param mixed $post_id
     *
     * @return self
     */
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

// Comment date Format Function

    public function dateFormat() {
        $date = new DateTime("$this->comment_date");
        $date ->format('d/m/Y à H\hi\m');

        return $date;
    }
}