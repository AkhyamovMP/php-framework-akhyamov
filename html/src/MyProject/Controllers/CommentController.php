<?php

namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\User;


class CommentController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    /*
            public function view(int $idArticle){
                $result = Comment::getByArticleId($idArticle);
                if ($result === []){
                    $this->view->renderHtml('errors/404.php', [], 404);
                    return;
                }

                $this->view->renderHtml('comments/view.php', ['comments' => $result]);
            }
    */
    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        $result = $comment;
        if ($result === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if (isset($_POST["comment"])) {
            $result->setText($_POST["comment"]);
            $result->save();
            header('Location: http://localhost:8080/article/' . $result->getArticle() . '#comment' . $commentId);
        } else {
            //echo $comment.getArticle();
            $this->view->renderHtml('comments/edit.php', ['comment' => $result]);
        }
    }

    public function add($idArticle)
    {
        $author = User::getById(1);
        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setArticleId($idArticle);
        $comment->setText($_POST["comment"]);
        $comment->save();
        header('Location: http://localhost:8080/article/' . $idArticle);
        //$this->view($idArticle);
        // var_dump($article);
    }

    public function delete(int $articleId): void
    {
        $result = Comment::getById($articleId);
        if ($result === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $result->delete();
    }


}

?>