<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterFeatureScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeFeatureScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use GuzzleHttp\Client;
use PHPUnit\Framework\Assert;

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
     * @BeforeSuite
     */
    public static function prepare($scope)
    {
        echo "Before All - as in playwright";
    }

    /**
     * @AfterSuite
     */
    public static function teardown($scope)
    {
        echo "After All - as in playwright";
    }

    /** @BeforeFeature */
    public static function prepareFeature(BeforeFeatureScope $scope)
    {
        echo "Before Feature - as in playwright";
    }

    /** @AfterFeature */
    public static function teardownFeature(AfterFeatureScope $scope)
    {
        echo "After Feature - as in playwright";
    }

    /** @BeforeScenario */
    public function before(BeforeScenarioScope $scope)
    {
        echo "Before Scenario - 'Before' as in playwright";
    }

    /** @AfterScenario */
    public function after(AfterScenarioScope $scope)
    {
        echo "After Scenario - 'After' as in playwright";
    }

    /**
     * @When the user makes request for all users data
     */
    public function theUserMakesRequestForAllUsersData()
    {
        $this->response = $this->client->get('/api/users');
    }

    /**
     * @When the user makes request for a single user data with a name :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAName($arg1)
    {
        $this->response = $this->client->get('/api/user/name=' . $arg1);
    }

    /**
     * @When the user makes request for a single user data with an id :arg1
     */
    public function theUserMakesRequestForASingleUserDataWithAnId($arg1)
    {
        $this->response = $this->client->get('/api/user/id=' . $arg1);
    }

    /**
     * @Then the user should get a response code of :arg1
     */
    public function theUserShouldGetAResponseCodeOf($arg1)
    {
        $obtainedResponseCode = $this->response->getStatusCode();

        Assert::assertEquals(
            $arg1,
            $obtainedResponseCode,
            __METHOD__ . " Expected response code $arg1 but got $obtainedResponseCode"
        );
    }

    /**
     * @Then the user should see :arg1 and :arg2 for all objects in the response
     */
    public function theUserShouldSeeAndForAllObjectsInTheResponse($arg1, $arg2)
    {
        $responseObject = json_decode($this->response->getBody());

        foreach ($responseObject as $id => $data) {
            Assert::assertObjectHasAttribute(
                $arg1,
                $data,
                __METHOD__ . " Expected attribute '$arg1' but found " . json_encode($data)
            );
            Assert::assertObjectHasAttribute(
                $arg2,
                $data,
                __METHOD__ . " Expected attribute '$arg2' but found " . json_encode($data)
            );
        }
    }

    /**
     * @Then the user should get :arg1 and :arg2 of a single user in the response
     */
    public function theUserShouldGetAndOfASingleUserInTheResponse($arg1, $arg2)
    {
        $responseObject = json_decode($this->response->getBody());

        Assert::assertObjectHasAttribute(
            $arg1,
            $responseObject,
            __METHOD__ . " Expected attribute '$arg1' but found " . json_encode($responseObject)
        );
        Assert::assertObjectHasAttribute(
            $arg2,
            $responseObject,
            __METHOD__ . " Expected attribute '$arg2' but found " . json_encode($responseObject)
        );
    }
}
