<?

class Unit
{
	static $command_id;

	static function serialize($input, $unit, $version)
	{
		$input->write_short($magic = 0);
		$input->write_int($unit->user_id);

		if ($version >= '1.32')
			$input->write_utf($name = $unit->login);

		$input->write_int($unit->armor);
		$input->write_int($unit->attack);
		$input->write_int($unit->level);
		$input->write_int($unit->fuzes);
		$input->write_int($unit->rubins);
		$input->write_int($unit->reaction);
		$input->write_int($unit->rating);

		if ($version >= '1.33')
		{
			# start clanmember structure
			$input->write_short(0);
			$input->write_short($memberrank = 3);
			$input->write_int($clan_id = 0);
			$input->write_utf($clan_name = "");
			$input->write_short($clan_emblem_size = 0);
			$input->write_int($clan_rating = 0);
			$input->write_int($clan_season_rating = 0);
			$input->write_short($review_state = 0);
			$input->write_int($prev_season_top_place = 0);
			# end clanmember structure
		}
	}
}