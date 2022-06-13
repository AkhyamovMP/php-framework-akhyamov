    <h2>Комментарии</h2>
    <ul>
    <?php

    foreach($comments as $comment){
        echo "<li>" . $comment->getText() . " <a href='comments/".$comment->getId()."/edit'>Редактировать</a></li>";
    }
    ?>
    </ul>

       