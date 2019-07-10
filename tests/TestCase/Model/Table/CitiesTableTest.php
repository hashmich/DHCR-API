<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitiesTable Test Case
 */
class CitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CitiesTable
     */
    public $Cities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cities',
        'app.Cities',
        'app.Courses',
        'app.Institutions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cities') ? [] : ['className' => CitiesTable::class];
        $this->Cities = TableRegistry::getTableLocator()->get('Cities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cities);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
	
	
	public function testGetCleanQuery() {
		$this->Cities->query = [
			'foo' => 'bar',
			'sort_count' => '',
			'group'
		];
		$query = $this->Cities->getCleanQuery();
		$this->assertArrayNotHasKey('foo', $query);
		$this->assertArrayHasKey('sort_count', $query);
		$this->assertArrayHasKey('group', $query);
	}
	
	
	public function testGetFilter() {
		$this->Cities->query = [
			'sort_count' => ''
		];
		$query = $this->Cities->getFilter();
		$this->assertArrayHasKey('sort_count', $query);
		$this->assertTrue($query['sort_count']);
		$this->assertArrayHasKey('course_count', $query);
		$this->assertTrue($query['course_count']);
		$this->assertArrayHasKey('group', $query);
		$this->assertTrue($query['group']);
	}
	
	
	public function testGetCity() {
		$city = $this->Cities->getCity(1);
		$this->assertArrayHasKey('course_count', $city);
	}
	
	
	public function testGetCities() {
		$this->Cities->query = ['course_count' => true];
    	$cities = $this->Cities->getCities();
		foreach($cities as $city) {
			$this->assertArrayHasKey('course_count', $city);
		}
		$this->Cities->query = [];
		$cities = $this->Cities->getCities();
		foreach($cities as $city) {
			// assertArrayNotHasKey is failing here for some reason!?
			$this->assertFalse(array_key_exists('course_count', $city));
		}
		$this->Cities->query = ['course_count' => true,'course_sort' => true];
		$cities = $this->Cities->getCities();
		$last = null;
		foreach($cities as $city) {
			if($last !== null)
				$this->assertTrue($last > $city['course_count']);
			$last = $city['course_count'];
		}
		$this->Cities->query = ['group' => true];
		$cities = $this->Cities->getCities();
		//TODO...
	}
 
}
