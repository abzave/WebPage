<?php

    interface IQueries{
        const ALL_POSTS_PREVIEW = "SELECT title, description, author, path AS image, date FROM post INNER JOIN image ON post.image = image.id";
        const POST_CONTENT = "SELECT path AS image, author, date, content FROM post INNER JOIN image ON post.image = image.id WHERE title = ?";
        const POST_CATEGORIES = "SELECT category AS categories FROM post_categories WHERE post = ?";
        const POST_TAGS = "SELECT tag AS tags FROM post_tags WHERE post = ?";
    }

?>