<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseParentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseParentTypesTable Test Case
 */
class CourseParentTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseParentTypesTable
     */
    public $CourseParentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CourseParentTypes',
        'app.CourseTypes',
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
        $config = TableRegistry::getTableLocator()->exists('CourseParentTypes') ? [] : ['className' => CourseParentTypesTable::class];
        $this->CourseParentTypes = TableRegistry::getTableLocator()->get('CourseParentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CourseParentTypes);

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
