<?php

namespace src\domain;

use Ramsey\Uuid\Uuid;
use src\model\Review;

class ReviewRepository
{
    public function getReviewUuid(string $uuid): ?Review
    {
        $cursor = Review::where(['uuid_review' => $uuid]);
        if ($cursor->valid()) {
            return $cursor->first();
        }
        return null;
    }

    public function postReview(string $data): void
    {
        $review = new Review();
        $arrays = explode(',', $data);
        foreach ($arrays as $array) {
            $pepe = explode(':', $array);
            $str_replace = str_replace(array('"', "'", '{',), ' ', $pepe[0]);
            $trim = trim($str_replace);
            $arra[$trim] = $pepe[1];
        }
        $review->setStars($arra['stars']);
        $review->setComment($arra['comment']);
        $review->setUuidReview(Uuid::uuid4());
        $review->setUuidUser($arra['uuid_user']); // ici faudrais prendre le uuid du user dans le json web token
        $review->setUuidItem($arra['uuid_item']);
        $review->setIdItem($arra['id_item']);
        $review->setdeleted_at('');
        $review->save();
    }

}