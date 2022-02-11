<?

# появился в 1.28, ранее был ChangeRace с командой 36
class BuySelectRace
{
	static $command_id = 50;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;
		$output->write_short($result = 0);

		if ($callback->versions[$user_id] >= '1.37')
		{
			$output->write_short($costs_size = 0);
			$output->write_utf($session_key = md5($user_id));
			$output->write_short($race_id);
			$output->write_byte($skin_id);
		}
	}
}