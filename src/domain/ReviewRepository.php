<?php

namespace src\domain;

use Ramsey\Uuid\Uuid;
use src\model\Review;

class ReviewRepository
{
    // le point d'interrogation, s'est pour Nullable types, qui veut dire que le type de donnees peut etre dans ce cas
    // du type de la \stdClass  OU ALORS DE TYPE NULL
    public function getReviewUuid(string $uuid): ?array
    {
        return Review::first($uuid)->toArray();
    }

    public function postReview(string $data): void
    {
        $review = new Review();
        $review->setStars(5);
        $review->setComment('test');
        $review->setUuidReview(Uuid::uuid4());
        $review->setUuidUser(Uuid::uuid4()); // ici faudrais prendre le uuid du user dans le json web token
        $review->setUuidItem(Uuid::uuid4());
        $review->save();
    }

}