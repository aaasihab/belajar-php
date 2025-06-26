<?php 

namespace Model 
{
    
    // membuat class yang merupakan implementasi dari nama tabel di database
    class Comment 
    {
        public function __construct(private ?int $id = null,
                                    private ?string $email = null,
                                    private ?string $comment = null)
        {
        }

        public function getId(): int|null 
        {
            return $this->id;
        }

        public function setId(?int $id): void
        {
            $this->id = $id;
        }
        public function getEmail(): string|null 
        {
            return $this->email;
        }

        public function setEmail(?string $email): void
        {
            $this->email = $email;
        }
        public function getComment(): string|null 
        {
            return $this->comment;
        }

        public function setComment(?string $comment): void
        {
            $this->comment = $comment;
        }
    }

}