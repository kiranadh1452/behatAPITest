## Behat Framework

Tests for [simpleAPI](https://github.com/kiranadh1452/simpleAPI) using Behat Framework


### Install Dependencies
  ```bash
  composer install
  ```

### Run Behat
  ```bash
  vendor/bin/behat
  ```

### If you have some missing steps, run following to add snippets to your context class
  ```bash
  vendor/bin/behat --dry-run --append-snippets
  ```

> The hooks used in Behat are displayed in file FeatureContext.php from line no. [29](https://github.com/kiranadh1452/behatAPITest/blob/master/features/bootstrap/FeatureContext.php#L29) upto line no. [67](https://github.com/kiranadh1452/behatAPITest/blob/master/features/bootstrap/FeatureContext.php#L67). <br>
These hooks not only require the function name and arguments to be like this, but also the comments should be in this manner.<br> The comments are also analysed to identify whether the following code section is a hook or not. <br><br>If your application requires some steps to be executed before or after the scenario, you can use these hooks. For example, you can use these hooks to set up some environment before the scenario or to clean up after the scenario.

### To run a particular test
  ```bash
  vendor/bin/behat <feature-file-location>
  ```

## Add Dependencies
> While adding more test cases, there may be cases where you need to add dependencies.
  ```bash
  composer require <package-name>
  ```