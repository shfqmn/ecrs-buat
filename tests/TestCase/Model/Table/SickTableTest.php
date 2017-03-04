<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SickTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SickTable Test Case
 */
class SickTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SickTable
     */
    public $Sick;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sick',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sick') ? [] : ['className' => 'App\Model\Table\SickTable'];
        $this->Sick = TableRegistry::get('Sick', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sick);

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
}
