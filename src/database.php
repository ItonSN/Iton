<?php

class Database extends PDO
{
    /** @var self $instance */
    private static ?self $instance = null;

    /** @var string $host */
    private string $host = "localhost";

    /** @var string $name */
    private string $name = "iton";

    /** @var int $port */
    private int $port = 3307;

    public function __construct()
    {
        parent::__construct("mysql:host=localhost;dbname=iton;port=3307", 'root', '');
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function run(string $query, array $args = [], bool $fetch = false): array|bool
    {
        try {
            $q = $this->prepare($query);

            if ($fetch) {
                $q->execute($args);
                return $q->fetchAll();
            } else {
                $q->execute($args);
                return true;
            }
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function userExists(string $email): bool
    {
        $query = $this->run("SELECT * FROM users WHERE email=?", [$email], true);

        if (empty($query))
            return false;
        else
            return true;
    }

    public function createUser(string $username, string $email, string $password, string $birthdate): bool
    {
        $query = $this->run(
            "INSERT INTO users(pseudo, email, password, birthdate) VALUES (?, ?, ?, ?)",
            [$username, $email, $password, $birthdate],
            false
        );

        return $query;
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
