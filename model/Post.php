<?php

require_once ("Model.php");

class Post extends Model {

// OBJECT ATTRIBUTES
	/**
	 * Post id
	 * @var [int]
	 */
	private $id;

	/**
	 * Post title
	 * @var [string]
	 */
	private $title;

	/**
	 * Post content
	 * @var [string]
	 */
	private $content;

	/**
	 * Post author
	 * @var [string]
	 */
	private $author;

	/**
	 * Post date of creation
	 * @var [int]
	 */
	private $post_date;
    private $publication_date;
    private $publication_status;

// GETTERS

	/**
	 * Id getter
	 * @return [int]
	 */
	public function getId()
	{
		return $this->id;
	}

    /**
     * Title getter
     * @return [string]
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return [string]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return [string]
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return [int]
     */
    public function getPost_date()
    {
        return $this->post_date;
    }

    /**
     * @return mixed
     */
    public function getPublication_date()
    {
        return $this->publication_date;
    }

    /**
     * @return mixed
     */
    public function getPublicationStatus()
    {
        return $this->publication_status;
    }

// SETTERS

    /**
     * [setId of post function]
     * @param [int] $id [post id]
     */
   public function setId($id)
    {  
            $this->id = $id;
            return $this;
    }

    /**
     * [setPost_date of post function]
     * @param [int] $postDate [post creation date]
     */
    public function setPost_date($postDate)
    {
            $this->post_date = $postDate;
            return $this;
    }

    /**
     * Title setter
     * @param [string] $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
    	if (is_string("$title")) {
    		$this->title = $title;

    		return $this;
    	} else {
    		throw new Exception("Le titre n'est pas valide");
    	}
    }

    /**
     * @param [string] $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param [string] $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @param mixed $publication_date
     *
     * @return self
     */
    public function setPublication_date($publication_date)
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    /**
     * @param mixed $publication_status
     *
     * @return self
     */
    public function setPublicationStatus($publication_status)
    {
        $this->publication_status = $publication_status;

        return $this;
    }

}








