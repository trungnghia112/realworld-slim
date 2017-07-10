<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Conduit\Models\User;

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

// Auth
$app->post('/users/login', function (Request $request, Response $response) {
    return $response->withJson(['status' => 'Need to be implemented']);
});

$app->post('/users', function (Request $request, Response $response) {
    $params = $request->getParsedBody()['user'];

    try {
        $user = User::create([
            'username' => $params['username'],
            'email' => $params['email'],
            'password' => password_hash($params['password'], PASSWORD_DEFAULT)
        ]);
    } catch (Exception $e) {
        return $response->withJson(['status' => 'error', 'message' => 'There was an error creating this user'])->withStatus(400);
    }

    return $response->withJson(['user' => $user])->withStatus(201);
});

$app->get('/user', function (Request $request, Response $response) {
    return $response->withJson(['status' => 'Need to be implemented']);
});

$app->put('/user', function (Request $request, Response $response) {
    return $response->withJson(['status' => 'Need to be implemented']);
});

$app->group('/articles', function () {
    // Articles
    $this->get('', function (Request $request, Response $response) {
        $articles = articlesDataStore();
        return $response->withJson($articles);
    });

    $this->get('/feed', function (Request $request, Response $response) {
        $articles = articlesDataStore();
        return $response->withJson($articles);
    });

    $this->get('/{slug}', function (Request $request, Response $response, $params) {
        $article = fetchFromArrayBySlug($params['slug'], articlesDataStore());
        return $response->withJson(['article' => $article]);
    });

    $this->post('', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->put('/{slug}', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->delete('/{slug}', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->put('/{slug}/favourite', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->delete('/{slug}/favourite', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    // Comments
    $this->get('/{slug}/comments', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->post('/{slug}/comments', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });

    $this->delete('/{slug}/comments/{id}', function (Request $request, Response $response, $params) {
        return $response->withJson(['status' => 'Need to be implemented']);
    });
});
