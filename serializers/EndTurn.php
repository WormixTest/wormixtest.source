<?

class EndTurn
{
	static $command_id = 120;

	static function handle($callback, $user_id, $input)
	{
		$mission_id = $input->read_short();
		$battle_id = $input->read_int();
		$random_seed = $input->read_short();
	}
}