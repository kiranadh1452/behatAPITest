Feature: Get user details

    As a user
    I want to get the user details
    So that 'What could go in here?'


  Scenario: Getting all the existing users
      When the user makes request for all users data
      Then the user should get a response code of '200'
      And the user should see 'id' and 'name' for all objects in the response


  Scenario: Getting a single user by id
      When the user makes request for a single user data with an id '1'
      Then the user should get a response code of '200'
      And the user should get 'id' and 'name' of a single user in the response


  Scenario: Getting a single user by name
      When the user makes request for a single user data with a name 'Kiran'
      Then the user should get a response code of '200'
      And the user should get 'id' and 'name' of a single user in the response