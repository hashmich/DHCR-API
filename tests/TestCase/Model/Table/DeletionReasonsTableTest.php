<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeletionReasonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeletionReasonsTable Test Case
 */
class DeletionReasonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeletionReasonsTable
     */
    public $DeletionReasons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DeletionReasons',
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
        $config = TableRegistry::getTableLocator()->exists('DeletionReasons') ? [] : ['className' => DeletionReasonsTable::class];
        $this->DeletionReasons = TableRegistry::getTableLocator()->get('DeletionReasons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeletionReasons);

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
