<?php

namespace src\model;

use Mongolid\Model\AbstractModel;

class Review extends AbstractModel
{
    protected $collection = 'reviews';

    /** @ODM\Field(type="int") @ODM\Index */
    protected $deletedAt;

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }

    public function getUuidReview(): string
    {
        return $this->uuid_review;
    }

    public function setUuidReview(string $uuid_review): void
    {
        $this->uuid_review = $uuid_review;
    }

    public function getUuidUser(): string
    {
        return $this->uuid_user;
    }


    public function setUuidUser(string $uuid_user): void
    {
        $this->uuid_user = $uuid_user;
    }

    public function getIdUser(): string
    {
        return $this->id_user;
    }

    public function setIdUser(string $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getIdItem(): string
    {
        return $this->id_item;
    }

    public function setIdItem(string $id_item): void
    {
        $this->id_item = $id_item;
    }

    public function getUuidItem(): string
    {
        return $this->uuid_item;
    }

    public function setUuidItem(string $uuid_item): void
    {
        $this->uuid_item = $uuid_item;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getStars(): string
    {
        return $this->stars;
    }

    public function setStars(string $stars): void
    {
        $this->stars = $stars;
    }

}