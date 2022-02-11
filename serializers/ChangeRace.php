<?

class ChangeRace
{
	static $command_id = 36;

	static function handle($callback, $user_id, $input)
	{
		$race_id = $input->read_byte();
		$money_type = $input->read_byte();
		UsersModel::set_race_id($user_id, $race_id);
	}
}