<?php

class Post
{

    public $title;
    public $author;
    public $published;

    public function __construct($title, $author, $published)
    {
        $this->title = $title;
        $this->author = $author;
        $this->published = $published;
    }
}

// Array of posts and their publishing status.
$posts = [
    new Post('My First Post', 'TDW', true),
    new Post('My Second Post', 'TDW', true),
    new Post('My Third Post', 'RMS', true),
    new Post('My Fourth Post', 'ESR', false)
];
// ===

// Returns unpublished posts
$unpublishedPosts = array_filter($posts, function ($post) {
    return !$post->published;
});
// ===

// Returns published posts
$publishedPosts = array_filter($posts, function ($post) {
    return $post->published;
});
// ===

// Modifies all items in the $posts array
$modified = array_map(function ($post) {
    $post->published = true;
}, $posts);
// ===

// Returns post by property using the post name as the array key
$authors = array_column($posts, 'author', 'title');
// ===

var_dump($authors);
