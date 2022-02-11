<?

class GetColiseumState
{
	static $command_id = 110;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;
		$output->write_int($num = 1);
		$output->write_bool($isOpen = true);
		$output->write_int($winCount = 1);
		$output->write_int($defeatCount = 1);
		$output->write_int($drawCount = 1);
		$output->write_int($error = 0);
	}
}