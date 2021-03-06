<?php include __DIR__ . '/../header.html'; ?>
    <h1 class="article__title"><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <hr>


    <h2>Комментарии</h2>
    <ul>
        <?php
        foreach ($comments as $comment) {
            echo "<li class='comments__comment' id='comment" . $comment->getId() . "'>" . $comment->getText() . " <a href='comments/" . $comment->getId() . "/edit'>Редактировать</a>.  <a href='comments/" . $comment->getId() . "/delete'>Удалить</a></li>";
        }
        ?>
    </ul>

    <form method="POST" action="<?= $article->getId() ?>/comments/add">
        <label for="comment">Комментарий</label>
        <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
        <button type="submit">Отправить</button>
    </form>

<?php include __DIR__ . '/../footer.html'; ?>