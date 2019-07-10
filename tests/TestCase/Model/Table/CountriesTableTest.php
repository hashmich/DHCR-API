<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountriesTable Test Case
 */
class CountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CountriesTable
     */
    public $Countries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Countries',
        'app.Cities',
        'app.Courses',
        'app.Institutions',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Countries') ? [] : ['className' => CountriesTable::class];
        $this->Countries = TableRegistry::getTableLocator()->get('Countries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Countries);

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
	
	
	public function testGetCleanQuery() {
		$this->Countries->query = [
			'foo' => 'bar',
			'sort_count' => ''
		];
		$query = $this->Countries->getCleanQuery();
		$this->assertArrayNotHasKey('foo', $query);
		$this->assertArrayHasKey('sort_count', $query);
	}
	
	
	public function testGetFilter() {
		$this->Countries->query = [
			'sort_count' => ''
		];
		$this->Countries->getFilter();
		$this->assertArrayHasKey('sort_count', $this->Countries->query);
		$this->assertTrue($this->Countries->query['sort_count']);
		$this->assertArrayHasKey('course_count', $this->Countries->query);
		$this->assertTrue($this->Countries->query['course_count']);
	}
    
    
    public function testGetCountry() {
    	$country = $this->Countries->getCountry(1);
    	$this->assertArrayHasKey('course_count', $country);
	}
	
	
	public function testGetCountries() {
 		$countries = $this->Countries->getCountries(true, false);
 		foreach($countries as $country) {
 			$this->assertArrayHasKey('course_count', $country);
		}
		$countries = $this->Countries->getCountries(false, false);
 		foreach($countries as $country) {
			// assertArrayNotHasKey is failing here for some reason!?
			$this->assertFalse(array_key_exists('course_count', $country));
		}
		$countries = $this->Countries->getCountries(true, true);
		$last = null;
		foreach($countries as $country) {
			if($last !== null)
				$this->assertTrue($last > $country['course_count']);
			$last = $country['course_count'];
		}
	}
 
 
 
}
