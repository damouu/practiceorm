<?php

namespace src\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\domain\ReviewRepository;

class ReviewController
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getReviewUuid(Request $request, Response $response, array $args): Response
    {
        $cursor = $this->reviewRepository->getReviewUuid($args['uuid']);
        if ($cursor) {
            $count = $size = 1;
            $review = array("stars" => $cursor->stars, "comment" => trim($cursor->comment), "uuid_review" => $cursor->uuid_review, "uuid_item" => $cursor->uuid_item);
            $statusCode = 200;
        } else {
            $count = $size = 0;
            $review = 'the review you are looking for does not exist';
            $statusCode = 400;
        }
        $response->getBody()->write(json_encode([
            "type" => "document",
            "count" => $count,
            "size" => $size,
            "review" => $review
        ], JSON_THROW_ON_ERROR));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($statusCode);
    }

    function postReview(Request $request, Response $response): Response
    {
        $review = $this->reviewRepository->postReview($request->getBody()->getContents());
        $payload = json_encode('Review created', JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }


}