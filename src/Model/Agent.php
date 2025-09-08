<?php

namespace App\Model;


/**
 * Represents an person agent who is the active participant on the Betting System.
 * 
 */
class Agent implements \JsonSerializable
{

    /**
     * @param string $name The agent's first name.
     * @param string $familyName The agent's family name.
     * @param int $uid The unique identifier for the agent.
     * @param string $nickName The agent's nickname.
     * @param string $email The agent's email address.
     */
    public function __construct(
        private string $name, 
        private string $familyName,
        private int $uid,
        private string $nickName,
        private string $email,
    ){}


    /**
    * Specify data which should be serialized to JSON.
    * @return array
    */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'familyName' => $this->familyName,
            'uid' => $this->uid,
            'nickName' => $this->nickName,
            'email' => $this->email
        ];
    }


}


?>
