<?php

    interface IQueries{
        const ALL_POSTS_PREVIEW = "SELECT title, description, author, path AS image, date FROM post INNER JOIN image ON post.image = image.id";
    }

?>