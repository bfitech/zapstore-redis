<?php


use BFITech\ZapCore\Logger;
use BFITech\ZapStore as zs;

class RedisTest extends RedisConnTest {

	public static $engine = 'redis';

	public function test_redis() {
		$logger = new Logger(
			Logger::ERROR, getcwd() . '/zapstore-redis-test.log');
		$config = json_decode(
			file_get_contents(getcwd() . '/zapstore-redis-test.config.json'),
			true);
		$sql = new zs\Redis($config['predis'], $logger);
		$this->assertEquals(
			$sql->get_connection_params()['redistype'], 'redis');
	}

}
