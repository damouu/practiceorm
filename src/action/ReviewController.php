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
        $review = $this->reviewRepository->getReviewUuid($args['uuid']);
        $reviewf = array("stars" => $review->stars, "comment" => trim($review->comment), "uuid_review" => $review->uuid_review, "uuid_item" => $review->uuid_item,);
        try {
            $response->getBody()->write(json_encode([
                "type" => "collection",
                "count" => 1,
                "size" => 1,
                "review" => $reviewf
            ], JSON_THROW_ON_ERROR));
        } catch (\JsonException $e) {
        }
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

    public function postReview(Request $request, Response $response): Response
    {
        $review = $this->reviewRepository->postReview($request->getBody()->getContents());
        $payload = json_encode('Review created', JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }


}