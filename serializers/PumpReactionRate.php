<?

class PumpReactionRate
{
	static $command_id = 704;

	static function handle($callback, $user_id, $input)
	{
		$friendId = $input->read_int();
		$sessionKey = $input->read_utf();
	}
}