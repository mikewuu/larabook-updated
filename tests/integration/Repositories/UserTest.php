<?php

use App\User;
use Laracasts\TestDummy\Factory as TestDummy;

/**
 *
 * @property StatusRepository repo
 */
class UserTest extends \Codeception\TestCase\Test {

    /**
     * @var \IntegrationTester
     */
    protected $tester;


    /**
     * Initializing properties
     */
    protected function _before()
    {
        $this->user = new User;
    }


    /**
     * @test
     *
     * Using names instead of the array index
     */
    public function it_follows_another_user()
    {
        // I have 2 users
        $user = TestDummy::times(2)->create('App\User');

        // User Id to follow (second user)
        $userIdToFollow = $user[1]->id;

        // And first User follows the second User
        $user[0]->followedUsers()->attach($userIdToFollow);

        // You should see the list of those that user[0] follows

            // Method 1 (assertCount) - seeing that there is 1 user following
            $this->assertCount(1, $user[0]->followedUsers()->get());

            // Method 2 (assertTrue) - Does the list of followed users contain the second user
            $this->assertTrue($user[0]->followedUsers->contains($user[1]->id));

            // Method 3 (seeRecord) - Seeing if the record exists in the table
            $this->tester->seeRecord('follows', [
               'follower_id' => $user[0]->id,
                'followed_id' => $user[1]->id
            ]);
    }

    /**
     * @test
     *
     * Uses array index to access specific user
     */
    public function it_unfollows_another_user()
    {
        // I have 2 users
        list($john, $susan) = TestDummy::times(2)->create('App\User');

        // User Id to unfollow (second user)
        $userIdToUnfollow = $susan->id;

        // And first User unfollows the second User
        $john->followedUsers()->detach($userIdToUnfollow);

        // You should see the list of those that user[0] follows

        // Method 1 (assertCount) - seeing that there is 1 user following
        $this->assertCount(0, $john->followedUsers()->get());

        // Method 2 (assertTrue) - Does the list of followed users contain the second user
        $this->assertFalse($john->followedUsers->contains($susan->id));

        // Method 3 (seeRecord) - Seeing if the record exists in the table
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);
    }

}