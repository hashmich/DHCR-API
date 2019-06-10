<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TadirahTechniquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TadirahTechniquesTable Test Case
 */
class TadirahTechniquesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TadirahTechniquesTable
     */
    public $TadirahTechniques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TadirahTechniques',
        'app.Courses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TadirahTechniques') ? [] : ['className' => TadirahTechniquesTable::class];
        $this->TadirahTechniques = TableRegistry::getTableLocator()->get('TadirahTechniques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TadirahTechniques);

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
