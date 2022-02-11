<?

class DistributePoints
{
	static $command_id = 14;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;
		$armor = $input->read_int();
		$attack = $input->read_int();
	}
}