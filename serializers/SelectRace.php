<?

class SelectRace
{
	static $command_id = 44;

	static function handle($callback, $user_id, $input)
	{
		if ($callback->versions[$user_id] >= '1.37')
		{
			$race_id = $input->read_short();
			$skin_id = $input->read_byte();
		}
		else
			$race_id = $input->read_byte();

		UsersModel::set_race_id($user_id, $race_id);

		$output = new ByteArray;
		$output->write_short(SelectRaceResult::SUCCESS);

		if ($callback->versions[$user_id] >= '1.37')
		{
			$output->write_short($race_id);
			$output->write_byte($skin_id);
		}
	}
}