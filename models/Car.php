<?php

include_once 'database/Connection.php';

class Car {
    public function __construct
    (
        private string $license, 
        private string $model, 
        private string $brand, 
        private string $description, 
        private string $photo,
        private PDO|null $connection = null
    )
    {
        $this->license = $license;
        $this->model = $model;
        $this->brand = $brand;
        $this->description = $description;
        $this->photo = $photo;
        $this->connection = Connection::connect();
    }

    /**
     * It takes the values of the properties of the object and inserts them into the database
     */
    public function store(): void
    {
        $query = 'INSERT INTO 
            cars (license, model, brand, description, photo) 
            VALUES (:license, :model, :brand, :description, :photo)
        ';

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':license' => $this->license,
                ':model' => $this->model,
                ':brand' => $this->brand,
                ':description' => $this->description,
                ':photo' => $this->photo
            ]);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * It updates the database with the new values of the object
     */
    public function update(): void
    {
        $query = 'UPDATE cars SET 
            license = :license,
            model = :model,
            brand = :brand,
            description = :description,
            photo = :photo
            WHERE license = :license
        ';

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':license' => $this->license,
                ':model' => $this->model,
                ':brand' => $this->brand,
                ':description' => $this->description,
                ':photo' => $this->photo
            ]);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * It deletes the car from the database
     */
    public function destroy(): void
    {
        $query = 'DELETE FROM cars WHERE license = :license';

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':license' => $this->license
            ]);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * It takes a license plate as a parameter, and returns a Car object if it finds one, or null if it
     * doesn't
     * 
     * @param string license The license plate of the car.
     * 
     * @return Car|null The car object
     */
    public static function find(string $license): Car|null
    {
        $query = 'SELECT * FROM cars WHERE license = :license';

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':license' => $license
            ]);

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return new Car(
                    $result['license'],
                    $result['model'],
                    $result['brand'],
                    $result['description'],
                    $result['photo']
                );
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return null;
    }

    /**
     * It returns an array of all the cars in the database
     * 
     * @return array An array of all the cars in the database.
     */
    public static function all(): array
    {
        $query = 'SELECT * FROM cars';

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return [];
    }

    /**
     * It searches for cars in the database by license, model or brand
     * 
     * @param string search The search term.
     * 
     * @return array An array of cars that match the search criteria.
     */
    public static function search(string $search): array
    {
        $query = 'SELECT * FROM 
            cars WHERE 
            license LIKE :search 
            OR 
            model LIKE :search 
            OR 
            brand LIKE :search
        ';

        try {
            $statement = Connection::connect()->prepare($query);

            $statement->execute([
                ':search' => '%' . $search . '%'
            ]);

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return [];
    }
}