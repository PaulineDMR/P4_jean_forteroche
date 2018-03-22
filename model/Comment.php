<?php

/**
* 
*/
class Comment
{
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
    public function getCommentDate()
    {
        return $this->comment_date;
    }
	/**
     * @return $post_id
     */
    public function getPostId()
    {
        return $this->post_id;
    }


//SETTER except for $id, $comment_date and $post_id generated automaticaly

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
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    /**
     * @param mixed $post_id
     *
     * @return self
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }
}