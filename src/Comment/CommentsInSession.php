<?php

namespace Anax\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentsInSession implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    private $key = null;

    public function __construct($key=null) { 
        $this->key = 'comments-' . $key; 
    } 

    /**
     * Add a new comment.
     *
     * @param array $comment with all details.
     * 
     * @return void
     */
    public function add($comment)
    {
        $comments = $this->session->get($this->key, []); 
        $comments[] = $comment; 
        $this->session->set($this->key, $comments); 
    }

    /**
     * Edit a comment.
     *
     * @param int $id with the index.
     * 
     * @return void
     */
    public function edit($id, $comment)
    {
        $comments = $this->session->get($this->key, []);
        $comments[$id] = $comment;

        $this->session->set($this->key, $comments);
    }

    /**
     * Find and return all comments.
     *
     * @return array with all comments.
     */
    public function findAll()
    {
        return $this->session->get($this->key, []);
    }



    /**
     * Delete all comments.
     *
     * @return void
     */
    public function deleteAll()
    {
        $this->session->set($this->key, []);
    }

    /**
     * Delete a comment.
     *
     * @return void
     */
    public function deleteComment($id)
    {
        $comments = $this->session->get($this->key, []); 
        unset($comments[$id]); 
        $comments = array_values($comments); // 'reindex' array
        $this->session->set($this->key, $comments); 
    }
}
