<?php

namespace Anax\Comment;

/**
 * To attach comments-flow to a page or some content.
 *
 */
class CommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


    /**
    * Show the comments
    *
    * @return void
    */
    
    public function indexAction()
    {
        $this->theme->setTitle("Kommentarer");
        $this->views->add('comment/index');
        $this->views->add('comment/write', [
                        'key' => 'comment', 
                        'redirect' => 'comment'
                        ]);
        $this->dispatcher->forward([
            'controller' => 'comment',
            'action'     => 'view',
            'params' => [
                'key' => 'comment', 
                'redirect' => 'comment', 
            ],
        ]);
    }

    /**
    * Write a comment
    *
    * @return void
    */
    public function writeAction($key=null,$redirect=null)
    {
        $key = $this->request->getPost('key');
        $redirect = $this->request->getPost('redirect');
        $this->theme->setTitle("Kommentarer");
        $this->views->add('comment/index');

        $this->views->add('comment/form', [
            'mail'      => null,
            'web'       => null,
            'name'      => null,
            'content'   => null,
            'output'    => null,
            'key'       => $key,
            'redirect'  => $redirect,
        ]);
        
        $this->dispatcher->forward([
            'controller' => 'comment',
            'action'     => 'view',
            'params' => [
                'key' => $key, 
                'redirect' => $redirect, 
            ],
        ]);
    }



    /**
     * View all comments.
     *
     * @return void
     */
    public function viewAction($key=null,$redirect=null)
    {
        $comments = new \Anax\Comment\CommentsInSession($key);
        $comments->setDI($this->di);

        $all = $comments->findAll();
        $this->views->add('comment/comments', [
            'comments' => $all,
            'key' => $key, 
            'redirect' => $redirect, 
            
        ]);
    }



    /**
     * Add a comment.
     *
     * @return void
     */
    public function addAction()
    {
        $isPosted = $this->request->getPost('doCreate');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comment = [
            'content'   => $this->request->getPost('content'),
            'name'      => $this->request->getPost('name'),
            'web'       => $this->request->getPost('web'),
            'mail'      => $this->request->getPost('mail'),
            'timestamp' => time(),
            'ip'        => $this->request->getServer('REMOTE_ADDR'),
        ];

        $comments = new \Anax\Comment\CommentsInSession($this->request->getPost('key'));
        $comments->setDI($this->di);

        $comments->add($comment);

        $this->response->redirect($this->request->getPost('redirect'));
    }



    /**
     * Remove all comments.
     *
     * @return void
     */
    public function removeAllAction()
    {
        $isPosted = $this->request->getPost('doRemoveAll');
        
        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }

        $comments = new \Anax\Comment\CommentsInSession($this->request->getPost('key'));
        $comments->setDI($this->di);

        $comments->deleteAll();

        $this->response->redirect($this->request->getPost('redirect'));
    }

    /**
     * Edit a comment.
     *
     * @return void
     */
    public function editAction()
    {
        $comments = new \Anax\Comment\CommentsInSession($this->request->getPost('key'));
        $comments->setDI($this->di);

        $comment = $comments->findAll();
        $id = $this->request->getPost('id');
        $this->theme->setTitle("Ändra kommentar");
        $this->views->add('comment/editform', [
            'mail'      => $comment[$id]['mail'],
            'web'       => $comment[$id]['web'],
            'name'      => $comment[$id]['name'],
            'content'   => $comment[$id]['content'],
            'output'    => null,
            'id'        => $id,
            'key'       => $this->request->getPost('key'),
            'redirect'  => $this->request->getPost('redirect'),
        ]);
    }

    /**
     * Save a comment.
     *
     * @return void
     */
    public function saveAction()
    {
        $isPosted = $this->request->getPost('doSave');
        if (!$isPosted) {
            $this->response->redirect($this->request->getPost('redirect'));
        }
        $id = $this->request->getPost('id');
        $comment = [
            'content'   => $this->request->getPost('content'),
            'name'      => $this->request->getPost('name'),
            'web'       => $this->request->getPost('web'),
            'mail'      => $this->request->getPost('mail'),
            'timestamp' => time(),
            'ip'        => $this->request->getServer('REMOTE_ADDR'),
        ];

        $comments = new \Anax\Comment\CommentsInSession($this->request->getPost('key'));
        $comments->setDI($this->di);

        $comments->edit($id, $comment);

        $this->response->redirect($this->request->getPost('redirect'));
    }

    /**
     * Save a comment.
     *
     * @return void
     */
    public function deleteAction()
    {
        $comments = new \Anax\Comment\CommentsInSession($this->request->getPost('key'));
        $comments->setDI($this->di);
        $id = $this->request->getPost('id');

        $comments->deleteComment($id);
        $this->response->redirect($this->request->getPost('redirect'));
    }
}
