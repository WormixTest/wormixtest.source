<?

class PVPEndBattle
{
	static $command_id = 1021;

	# магическая победа
	static function magic_win($battle_id, $turn_num, $command_num)
	{
		$output = new ByteArray;

		$output->write_int($battle_id);
		$output->write_short($turn_num);
		$output->write_short($command_num);
		$output->write_short($lengthplayer_nums = 2);

		# всегда дает победу, х.з., рандом комбинация, просто повезло подобрать
		$output->write_byte(0);
		$output->write_byte(1);
		$output->write_short($lengthOfResult = 1);
		$output->write_byte(0);
		$output->write_byte($confirmed = 255);
		return $output;
	}

	static function magic_loose($battle_id, $turn_num, $command_num)
	{
		$output = new ByteArray;

		$output->write_int($battle_id);
		$output->write_short($turn_num);
		$output->write_short($command_num);
		$output->write_short($lengthplayer_nums = 2);

		$output->write_short($lengthOfResult = 1);
		$output->write_byte(0);
		$output->write_byte($confirmed = 255);

		return $output;
	}
}