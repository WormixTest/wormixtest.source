<?

class EndBattle
{
	static $command_id = 84;

	static function handle($callback, $user_id, $input)
	{
		# 0 - проигр, 1 - выиграл
		$result = $input->read_int();
		$callback->log('result', $result);
		$callback->battleProcess($input);
	}
}