<?php
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Karla\Karla;

if ("" == shell_exec ( "which convert | grep '/opt/local/bin/'" )) {
	define ( 'PATH_TO_IMAGEMAGICK', '/usr/bin/' );
} else {
	define ( 'PATH_TO_IMAGEMAGICK', '/opt/local/bin/' );
}

/**
 * Features context.
 */
class FeatureContext extends BehatContext {
	
	/**
	 * Initializes context.
	 * Every scenario gets it's own context object.
	 *
	 * @param array $parameters
	 *        	context parameters (set them up through behat.yml)
	 */
	public function __construct(array $parameters) {
		// Initialize your context here
	}
	
	/**
	 * @Given /^I can access Karla$/
	 */
	public function iCanAccessKarla() {
		Karla::perform ( PATH_TO_IMAGEMAGICK )->identify ();
	}
	
	/**
	 * @When /^I perform the identify action$/
	 */
	public function iPerformTheIdentifyAction() {
		$this->output = Karla::perform ( PATH_TO_IMAGEMAGICK )->identify ()->in ( 'tests/_data/demo.jpg' )->execute ();
	}
	
	/**
	 * @Then /^I should get a string with info about the image$/
	 */
	public function iShouldSeeInfoAboutTheImage() {
		if (! preg_match ( '/.*JPEG.*/', $this->output )) {
			throw new Exception ( "Actual output is:\n" . $this->output );
		}
	}
}