<?php

use Slim\App;

return static function (App $app) {

    $app->get('/api/review/{uuid}[/]', [src\action\ReviewController::class, 'getReviewUuid']);
    $app->post('/api/review[/]', [src\action\ReviewController::class, 'postReview']);

};
