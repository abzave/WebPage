<?php

    interface IQueries{

        const ALL_POSTS_PREVIEW = "SELECT title, description, author, path AS image, date FROM post INNER JOIN image ON post.image = image.id LIMIT ?, ?";
        const ALL_CATEGORIES = "SELECT name FROM category";
        const ALL_TAGS = "SELECT name FROM tag";
        const POSTS_SIMILAR_TO = "SELECT title, description, author, path AS image, date FROM post INNER JOIN image ON post.image = image.id WHERE title LIKE ? LIMIT ?, ?";
        const POST_CONTENT = "SELECT path AS image, author, date, content FROM post INNER JOIN image ON post.image = image.id WHERE title = ?";
        const POST_CATEGORIES = "SELECT category FROM post_categories WHERE post = ?";
        const POST_TAGS = "SELECT tag FROM post_tags WHERE post = ?";
        const POSTS_BY_CATEGORIES = "SELECT title, description, author, path AS image, date FROM post INNER JOIN image ON post.image INNER JOIN post_categories ON post.title = post_categories.post = image.id WHERE category IN (";
        const POSTS_BY_TAGS = "SELECT title, description, author, path AS image, date FROM post INNER JOIN post_tags ON post.title = post_tags.post INNER JOIN image ON post.image = image.id WHERE tag IN (";
        const ALL_PROJECTS_PREVIEW = "SELECT title, category, image, description FROM project";
        const PROJECT_INFORMATION = "SELECT image, category, date, long_description FROM project WHERE title = ?";
        const PROJECT_LANGUAGES = "SELECT language FROM project_languages WHERE project = ?";
        const PROJECT_TECHNOLOGIES = "SELECT technology FROM project_technologies WHERE project = ?";
        const PROJECT_PARADIGMS = "SELECT paradigm FROM project_paradigms WHERE project = ?";

    }

?>