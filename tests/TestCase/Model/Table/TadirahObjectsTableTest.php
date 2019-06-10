<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TadirahObjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TadirahObjectsTable Test Case
 */
class TadirahObjectsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TadirahObjectsTable
     */
    public $TadirahObjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TadirahObjects',
        'app.Courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TadirahObjects') ? [] : ['className' => TadirahObjectsTable::class];
        $this->TadirahObjects = TableRegistry::getTableLocator()->get('TadirahObjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TadirahObjects);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
