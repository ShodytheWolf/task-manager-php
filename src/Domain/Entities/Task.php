<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;
use App\Domain\Entities\State;

#[ORM\Entity]
#[ORM\Table(name: 'Task')]
class Task{

    #the task ID which is autogenerated by MariaDB
    #[ORM\Id]
    #[ORM\Column(type: 'integer', unique: true)]
    #[ORM\GeneratedValue]
    private ?int $id;

    #the title of the task at hand
    #[ORM\Column(type: 'string', length: 15, nullable: false)]
    private string $title;

    #The limit date for the task, it uses a PHP implementation of DateTimeImmutable
    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $limitDate;


    #the title of the task at hand
    #[ORM\Column(type: 'string')]
    private string $description;

    #the enum with the states of the task, which are represented by a single
    #character in the string, see State.php
    #[ORM\Column(type: 'string', enumType: State::class)]
    private State $taskState;


    private array $users;


    #----------------------------GETTERS-------------------------------------------------
    public function getState(): State{
        return $this->taskState;
    }


    #----------------------------SETTERS-------------------------------------------------
    public function setState(State $state): void{
        $this->taskState = $state;
    }
}