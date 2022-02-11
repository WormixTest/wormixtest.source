<?

class EndTurnResult
{
	static $command_id = 10120;

	static function serialize($output, $version, $mission_id, $battle_id, $turn_num, $session_key)
	{
		$output->write_short($mission_id);
		$output->write_int($battle_id);
		$output->write_short($turn_num);
		$output->write_short($valid = 1);
		$output->write_utf($session_key);
	}
}