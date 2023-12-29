<?php

declare(strict_types=1);

namespace App;

class Ticket
{
    protected DB $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function fetchLazy(\PDOStatement $stmt): \Generator
    {
        foreach ($stmt as $record) {
            yield $record;
        }
    }

    public function all(): \Generator
    {
        $stmt = $this->db->query('SELECT id, content FROM tickets');

        return $this->fetchLazy($stmt);
    }
}
