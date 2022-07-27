<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $response;
    private $client;

    /**
     * Initializes context.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000/',
        ]);
    }

    /**
     * @When the user makes request for all users data
     */
    public function theUserMakesRequestForAllUsersData()
    {
        $this->response = $this->client->get('/api/users');
    }

    /**
     * @Then the user should get a response code of :arg1
     */
    public function theUserShouldGetAResponseCodeOf($arg1)
    {
        $obtainedResponseCode = $this->response->getStatusCode();

        if ($obtainedResponseCode != $arg1) {
            throw new Exception("Expected response code of $arg1 but got $obtainedResponseCode");
        }
    }

    /**
     * @Then the user should see :arg1 and :arg2 for all objects in the response
     */
    public function theUserShouldSeeAndForAllObjectsInTheResponse($arg1, $arg2)
    {
        // throw new PendingException();
    }

    /**
     * @When the user makes request for a single user data with an id :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAnId($arg1)
    {
        $this->response = $this->client->get('/api/user/id='.$arg1);
    }

    /**
     * @Then the user should get :arg1 and :arg2 of a single user in the response
     */
    public function theUserShouldGetAndOfASingleUserInTheResponse($arg1, $arg2)
    {
        // throw new PendingException();
    }

    /**
     * @When the user makes request for a single user data with a name :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAName($arg1)
    {
        $this->response = $this->client->get('/api/user/name='.$arg1);
    }
}
