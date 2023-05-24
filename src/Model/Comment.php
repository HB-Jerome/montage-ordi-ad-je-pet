<?php

namespace Model;

class Comment
{

    protected ?int $idComment = null;
    protected $commentDate = null;
    protected ?bool $messageSeen = false;
    protected ?string $message;
    protected ?int $idModel = null;
    protected ?int $idUser = null;
    protected ?string $username = null;


    public function getIdComment(): ?int
    {
        return $this->idComment;
    }


    public function setIdComment(?int $idComment): self
    {
        $this->idComment = $idComment;
        return $this;
    }


    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function setCommentDate($commentDate): self
    {
        $this->commentDate = $commentDate;
        return $this;
    }


    public function getMessageSeen(): ?bool
    {
        return $this->messageSeen;
    }

    public function setMessageSeen(?bool $messageSeen): self
    {
        $this->messageSeen = $messageSeen;
        return $this;
    }


    public function getIdModel(): ?int
    {
        return $this->idModel;
    }

    public function setIdModel(?int $idModel): self
    {
        $this->idModel = $idModel;
        return $this;
    }


    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return 
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param  $message 
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return 
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param  $username 
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }
}