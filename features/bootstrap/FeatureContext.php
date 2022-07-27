<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When the user makes request for all users data
     */
    public function theUserMakesRequestForAllUsersData()
    {
        throw new PendingException();
    }

    /**
     * @Then the user should get a response code of :arg1
     */
    public function theUserShouldGetAResponseCodeOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the user should see :arg1 and :arg2 for all objects in the response
     */
    public function theUserShouldSeeAndForAllObjectsInTheResponse($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When the user makes request for a single user data with an id :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAnId($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the user should get :arg1 and :arg2 of a single user in the response
     */
    public function theUserShouldGetAndOfASingleUserInTheResponse($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When the user makes request for a single user data with a name :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAName($arg1)
    {
        throw new PendingException();
    }
}
