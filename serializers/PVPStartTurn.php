<?

class PVPStartTurn
{
	static $command_id = 1019;

	static function serialize
	(
		$output,
		$battle_id,
		$turn_num,
		$command_num,
		$next_player_num,
		$dropped_nums_length
	)
	{
		$output->write_int($battle_id);
		$output->write_byte($next_player_num);
		$output->write_short($turn_num);
		$output->write_short($command_num);
		$output->write_short($dropped_nums_length);
	}
}