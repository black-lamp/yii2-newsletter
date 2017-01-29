<?php
namespace tests\unit\components;

use Yii;
use tests\unit\DbTestCase;

use tests\fixtures\ClientFixture;
use bl\newsletter\common\entities\Client;
use bl\newsletter\common\components\ClientManager;
use bl\newsletter\common\exceptions\WrongValueException;

/**
 * Test case for [[ClientManager]]
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class ClientManagerTest extends DbTestCase
{
    /**
     * @var ClientManager
     */
    private $clientManager;


    public function fixtures()
    {
        return [
            'client' => [
                'class' => ClientFixture::class
            ]
        ];
    }

    public function _before()
    {
        $this->clientManager = Yii::$app->get('clientManager');
    }

    public function testWrongValueException()
    {
        $this->expectException(WrongValueException::class);

        $this->clientManager->type = 'wrong type';
        $this->clientManager->buildClient();
    }

    private function typeTest($type, $scenario)
    {
        $client = $this->clientManager->buildClient();

        $this->assertInstanceOf(Client::class, $client, 'Method should returns a Client object');
        $this->assertEquals($type, $client->getScenario(), "Client should use a $scenario scenario");
    }

    public function testTypeEmail()
    {
        $this->clientManager->type = ClientManager::TYPE_EMAIL;
        $this->typeTest(ClientManager::TYPE_EMAIL, 'Email');
    }

    public function testTypePhone()
    {
        $this->clientManager->type = ClientManager::TYPE_PHONE;
        $this->typeTest(ClientManager::TYPE_PHONE, 'Phone');
    }

    public function testTypeMixed()
    {
        $this->clientManager->type = ClientManager::TYPE_MIXED;
        $this->typeTest(ClientManager::TYPE_MIXED, 'Mixed');
    }

    public function testGetCsv()
    {
        $this->loadFixtures();

        $expected = "test1@example.com,111\n"
                  . "test2@example.com,222\n"
                  . "test3@example.com,333\n";
        $actual = $this->clientManager->getCsv();

        $this->assertEquals($expected, $actual, 'Method should returns a string in CSV format');
    }
}