<?

class SearchTheHouse
{
	static $command_id = 81;

	static function handle($callback, $user_id, $input)
	{
		$sessionKey = $input->read_utf();
		$friendId = $input->read_int();
		$keyNum = $input->read_byte();
		# check secure
	}
}