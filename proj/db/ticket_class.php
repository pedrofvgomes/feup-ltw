<?php
class Ticket
{
    public int $id;
    public int $authorid;
    public int $agentid;
    public string $subject;
    public string $description;
    public string $department;
    public string $priority;
    public string $status;
    public DateTime $datecreated;

    public function __construct(int $id, int $authorid, int $agentid, string $subject, string $description, string $department, string $priority, string $status, DateTime $datecreated)
    {
        $this->id = $id;
        $this->authorid = $authorid;
        $this->agentid = $agentid;
        $this->subject = $subject;
        $this->description = $description;
        $this->department = $department;
        $this->priority = $priority;
        $this->status = $status;
        $this->datecreated = $datecreated;
    }

    public static function createTicket(PDO $db, int $authorid, int $agentid, string $subject, string $description, string $department): ?Ticket
    {
        $stmt = $db->prepare('
            insert into Ticket (author, agent, subject, description, department)
            values (?,?,?,?, ?)
        ');

        $stmt->execute([$authorid, $agentid, $subject, $description, $department]);

        $ticketId = intval($db->lastInsertId());

        if ($ticketId) {
            $stmt = $db->prepare('
                select * from Ticket
                where id = ?
            ');
            $stmt->execute([$ticketId]);

            $ticket = $stmt->fetch();

            if ($ticket) {
                return new Ticket(
                    $ticket['id'], $ticket['author'], $ticket['agent'], $ticket['subject'], $ticket['description'], $ticket['department'], $ticket['priority'] == null? 'None' : $ticket['priority'], $ticket['status'] == nulL? 'None' : $ticket['status'], new DateTime($ticket['datecreated'])
                );
            }
        }

        return null;
    }

    public static function getTicket(PDO $db, int $ticketId): ?Ticket
    {
        $stmt = $db->prepare('
            select * from Ticket
            where id = ?
        ');
        $stmt->execute([$ticketId]);

        $ticket = $stmt->fetch();

        if ($ticket) {
            return new Ticket(
                $ticket['id'], $ticket['author'], $ticket['agent'] == null? 0 : $ticket['agent'], $ticket['subject'], $ticket['description'], $ticket['department'] == null? '' : $ticket['department'], $ticket['priority'] == null? '' : $ticket['priority'], $ticket['status'] == null? '' : $ticket['status'], new DateTime($ticket['datecreated'])
            );
        } else {
            return null;
        }
    }
}


?>
