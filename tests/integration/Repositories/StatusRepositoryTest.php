<?php

use Laracasts\TestDummy\Factory as TestDummy;
use App\Repositories\StatusRepository;

/**
 *
 * @property StatusRepository repo
 */
class StatusRepoTest extends \Codeception\TestCase\Test {

    /**
     * @var \IntegrationTester
     */
    protected $tester;


    /**
     * Initializing properties
     */
    protected function _before()
    {
        $this->repo = new StatusRepository;
    }


    /**
     * @test
     */
    public function it_gets_all_statuses_for_a_user()
    {
        $user = TestDummy::times(2)->create('App\User');

        TestDummy::times(2)->create('App\Status', [
            'user_id' => $user[0]->id
        ]);

        TestDummy::times(2)->create('App\Status', [
            'user_id' => $user[1]->id
        ]);

        $statusesForUser = $this->repo->getAllForUser($user[0]);

        $this->assertCount(2, $statusesForUser);

    }

    /**
     * @test
     */
    public function it_saves_a_status_for_a_user()
    {
        // Given I have an unsaved status
        $status = TestDummy::create('App\Status', [
            'user_id' => null,
            'body' => 'My Status'
        ]);

        // And existing user
        $user = TestDummy::create('App\User');

        // When I try to persist this status
        $savedStatus = $this->repo->save($status, $user->id);

        // It should be saved
        $this->tester->seeRecord('statuses', [
            'body' => 'My Status',
        ]);

        // Status should have correct user id
        $this->assertEquals($user->id, $savedStatus->user_id);
    }

}