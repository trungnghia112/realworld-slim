<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Dummy Data
function articlesDataStore () {
    $articles = [
        'articles' => [
            [
                'description' => 'Ever wonder how?',
                'slug' => 'how-to-train-your-dragon',
                'title' => 'How to train your dragon',
                'body' => 'It takes a Jacobian',
                'tagList' => ['dragons', 'training'],
                'createdAt' => '2016-02-18T03:22:56.637Z',
                'updatedAt' => '2016-02-18T03:48:35.824Z',
                'favorited' => false,
                'favoritesCount' => 0,
                'author' => [
                  'username' => 'jake',
                  'bio' => 'I work at statefarm',
                  'image' => 'https://i.stack.imgur.com/xHWG8.jpg',
                  'following' => false
                ]
            ],
            [
                'description' => 'So toothless',
                'slug' => 'how-to-train-your-dragon-2',
                'title' => 'How to train your dragon 2',
                'body' => 'It takes a Jacobian 2',
                'tagList' => ['dragons', 'training'],
                'createdAt' => '2016-02-18T03:22:56.637Z',
                'updatedAt' => '2016-02-18T03:48:35.824Z',
                'favorited' => false,
                'favoritesCount' => 0,
                'author' => [
                  'username' => 'jake',
                  'bio' => 'I work at statefarm',
                  'image' => 'https://i.stack.imgur.com/xHWG8.jpg',
                  'following' => false
                ]
            ]
        ]
    ];
    $articles['articlesCount'] = count($articles['articles']);

    return $articles;
}

function fetchFromArrayBySlug($slug, $store)
{
    foreach ($store['articles'] as $article) {
        if ($article['slug'] == $slug) {
            return $article;
        }
    }
    return false;
}

// Routes

$app->get('/articles/feed', function (Request $request, Response $response) {
    $articles = articlesDataStore();
    return $response->withJson($articles);
});

$app->get('/articles', function (Request $request, Response $response) {
    $articles = articlesDataStore();
    return $response->withJson($articles);
});

$app->get('/articles/{slug}', function (Request $request, Response $response, $params) {
    $article = fetchFromArrayBySlug($params['slug'], articlesDataStore());
    return $response->withJson(['article' => $article]);
});

$app->post('/articles', function (Request $request, Response $response, $params) {
    // Fill in the stub
});

$app->put('/articles/{slug}', function (Request $request, Response $response, $params) {
    // Fill in the stub
});

$app->delete('/articles/{slug}', function (Request $request, Response $response, $params) {
    // Fill in the stub
});

$app->put('/articles/{slug}/favourite', function (Request $request, Response $response, $params) {
    // Fill in the stub
});

$app->delete('/articles/{slug}/favourite', function (Request $request, Response $response, $params) {
    // Fill in the stub
});

