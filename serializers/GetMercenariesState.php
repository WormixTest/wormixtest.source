<?

# появилось в 1.31
# битва наёмников
# кабан с дубинкой в главном меню
class GetMercenariesState
{
	static $command_id = 126;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;

		$output->write_int($num = 0);
		$output->write_bool($isOpen = false);
		$output->write_int($win = 0);
		$output->write_int($defeat = 0);
		$output->write_int($draw = 0);
		$output->write_int($total_win = 0);
		$output->write_int($total_defeat = 0);
		$output->write_int($total_draw = 0);

		return $output;
	}

}