<?php

    interface IQueries{

        const LIMIT_QUERY = " LIMIT ?, ?";
        const COUNT_QUERY = "SELECT COUNT(*) AS amount ";
        const POST_PREVIEW_COLUMNS = "SELECT title, description, author, path AS image, date ";
        const ALL_POSTS_PREVIEW = "FROM post INNER JOIN image ON post.image = image.id";
        const ALL_CATEGORIES = "SELECT name FROM category";
        const ALL_TAGS = "SELECT name FROM tag";
        const POSTS_SIMILAR_TO = "FROM post INNER JOIN image ON post.image = image.id WHERE title LIKE ?";
        const POST_CONTENT = "SELECT path AS image, author, date, content FROM post INNER JOIN image ON post.image = image.id WHERE title = ?";
        const POST_CATEGORIES = "SELECT category FROM post_categories WHERE post = ?";
        const POST_TAGS = "SELECT tag FROM post_tags WHERE post = ?";
        const POSTS_BY_CATEGORIES = "FROM post INNER JOIN image ON post.image INNER JOIN post_categories ON post.title = post_categories.post = image.id WHERE category IN (";
        const POSTS_BY_TAGS = "FROM post INNER JOIN post_tags ON post.title = post_tags.post INNER JOIN image ON post.image = image.id WHERE tag IN (";
        const ALL_PROJECTS_PREVIEW = "SELECT title, category, image, description FROM project";
        const PROJECT_INFORMATION = "SELECT image, category, date, long_description FROM project WHERE title = ?";
        const PROJECT_LANGUAGES = "SELECT language FROM project_languages WHERE project = ?";
        const PROJECT_TECHNOLOGIES = "SELECT technology FROM project_technologies WHERE project = ?";
        const PROJECT_PARADIGMS = "SELECT paradigm FROM project_paradigms WHERE project = ?";

    }

?>