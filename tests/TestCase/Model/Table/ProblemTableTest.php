<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProblemTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProblemTable Test Case
 */
class ProblemTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProblemTable
     */
    public $Problem;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.problem',
        'app.report',
        'app.users',
        'app.uploads',
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
        $config = TableRegistry::exists('Problem') ? [] : ['className' => 'App\Model\Table\ProblemTable'];
        $this->Problem = TableRegistry::get('Problem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Problem);

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
