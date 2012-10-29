<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  User
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JUserHelper.
 * Generated by PHPUnit on 2009-10-26 at 22:44:33.
 *
 * @package     Joomla.UnitTest
 * @subpackage  User
 * @since       12.1
*/
class JUserHelperTest extends TestCaseDatabase
{
	/**
	 * @var JUserHelper
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->saveFactoryState();
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return void
	 */
	protected function tearDown()

	/**
	 * Gets the data set to be loaded into the database during setup
	 *
	 * @return  xml dataset
	 *
	 * @since   12.2
	 */
	protected function getDataSet()
	{
		return $this->createXMLDataSet(__DIR__ . '/JUserTest.xml');
	}

	/**
	 * Test cases for userGroups
	 *
	 * Each test case provides
	 * - integer  userid  a user id
	 * - array    group   user group, given as hash
	 *                    group_id => group_name,
	 *                    empty if undefined
	 * - array    error   error info, given as hash
	 *                    with indices 'code', 'msg', and
	 *                    'info', empty, if no error occured
	 *
	 * @see ... (link to where the group and error structures are
	 *      defined)
	 * @return array
	 */
	public function casesGetUserGroups()
	{
		return array(
			'unknownUser' => array(
				1000,
				array(),
				array(
					'code' => 'SOME_ERROR_CODE',
					'msg' => 'JLIB_USER_ERROR_UNABLE_TO_LOAD_USER',
					'info' => ''
				),
			),
		);
	}

	/**
	 * TestingGetUserGroups().
	 *
	 * @param   integer  $userid    User ID
	 * @param   mixed    $expected  User object or empty array if unknown
	 * @param   array    $error     Expected error info
	 *
	 * @dataProvider casesGetUserGroups
	 * @covers  JUserHelper::getUserGroups
	 * @return  void
	 */
	public function testGetUserGroups($userid, $expected, $error)
	{
		$this->assertThat(
			JUserHelper::getUserGroups($userid),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test cases for userId
	 *
	 * @return array
	 */
	public function casesGetUserId()
	{
		return array(
			'admin' => array(
				'admin',
				42,
				array(),
			),
			'unknown' => array(
				'unknown',
				null,
				array(),
			),
		);
	}

	/**
	 * TestingGetUserGroups().
	 *
	 * @param   string  $username  User name
	 * @param   int     $expected  Expected user id
	 * @param   array   $error     Expected error info
	 *
	 * @dataProvider casesGetUserId
	 * @covers  JUserHelper::getUserId
	 * @return  void
	 */
	public function testGetUserId($username, $expected, $error)
	{
		$expResult = $expected;
		$this->assertThat(
			JUserHelper::getUserId($username),
			$this->equalTo($expResult)
		);

	}
}
