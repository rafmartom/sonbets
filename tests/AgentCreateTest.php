<?php

use PHPUnit\Framework\TestCase;
use App\Model\Agent;

final class AgentCreateTest extends TestCase
{
    public function testAgentCreate(): void
    {
        $agent = new Agent(
            name : "John", 
            familyName : "Doe", 
            uid : 3, 
            nickName : "jDoe" , 
            email : "john.doe@example.com"
        );

        $jsonString = json_encode($agent, JSON_PRETTY_PRINT);


        $expectedJson = <<<JSON
{
    "name": "John",
    "familyName": "Doe",
    "uid": 3,
    "nickName": "jDoe",
    "email": "john.doe@example.com"
}
JSON;

        $this->assertJsonStringEqualsJsonString($expectedJson, $jsonString);

    }
}


?>
