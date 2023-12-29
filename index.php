<?php

declare(strict_types=1);

use App\DB;
use App\Ticket;

require_once __DIR__ . '/autoload.php';

$ticket = new Ticket(new DB());

foreach ($ticket->all() as $ticket) {
    echo $ticket['id'] . ': ' . substr($ticket['content'], 0, 15) . '<br/>';
}
