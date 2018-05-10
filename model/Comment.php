<?php

require_once ("Model.php");

class Comment extends Model {
	private $id;
	private $comment;
	private $author;
	private $comment_date;
	private $post_id;
    private $warning;
    private $moderated;

// GETTERS

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

    /**
     * Return "warning" value (TRUE or FALSE)
     * @return [string] $warning
     */
    public function getWarning() {
        return $this->warning;
    }

    /**
     * @return mixed
     */
    public function getModerated()
    {
        return $this->moderated;
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

    /**
     * @param mixed $warning
     *
     * @return self
     */
    public function setWarning($warning)
    {
        $this->warning = $warning;

        return $this;
    }

    /**
     * @param mixed $moderate
     *
     * @return self
     */
    public function setModerated($moderated)
    {
        $this->moderated = $moderated;

        return $this;
    }
}