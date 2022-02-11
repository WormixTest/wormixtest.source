<?

class TopClansMainRequest
{
	static $command_id = 96;

	static function handle($callback, $user_id, $input)
	{
		$callback->syslog("user $user_id TopClansMainRequest called", $input->string);
		$isSeason = $input->read_bool();
		$callback->log('isSeason', $isSeason);
	}
}