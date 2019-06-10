<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DisciplinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DisciplinesTable Test Case
 */
class DisciplinesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DisciplinesTable
     */
    public $Disciplines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Disciplines',
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
        $config = TableRegistry::getTableLocator()->exists('Disciplines') ? [] : ['className' => DisciplinesTable::class];
        $this->Disciplines = TableRegistry::getTableLocator()->get('Disciplines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Disciplines);

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
