<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportTable Test Case
 */
class ReportTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportTable
     */
    public $Report;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.report',
        'app.users',
        'app.uploads',
        'app.problem',
        'app.sick'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Report') ? [] : ['className' => 'App\Model\Table\ReportTable'];
        $this->Report = TableRegistry::get('Report', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Report);

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
