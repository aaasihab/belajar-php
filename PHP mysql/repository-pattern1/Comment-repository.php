<?php

namespace Repository1
{
    use Model1\Comments;
    use PDOException;

    interface CommentsRepository
    {
        public function insert(Comments $comments): void;
        public function findById(int $id): ?Comments; 
        public function findAll(): ?array;
    }

    class CommentsRepositoryImpl implements CommentsRepository
    {
        public function __construct(private \PDO $connection)
        {
        }

        public function insert(Comments $comments): void
        {
            $sql = "INSERT INTO comments(email, comment) VALUES(?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$comments->getEmail(), $comments->getComment()]);

            if($statement){
                echo "Data berhasil ditambahkan";
            }
        }

        public function findById(int $id): ?Comments
        {
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);

            if($row = $statement->fetch()){
                return new Comments(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            } else {
                return null;
            }
        }

        public function findAll(): ?array
        {
            $sql = "SELECT * FROM comments";
            $statement = $this->connection->query($sql);

            $array = [];

            while($row = $statement->fetch()){
                $array[] = new Comments(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            }
            return $array;
        }
    }
}