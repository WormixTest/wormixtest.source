<?

# появилось в 1.31
class GetMercenariesDefs
{
	static $command_id = 124;

	static function handle($callback, $user_id, $input)
	{
		$mercenariesDefs = [];
		$output = new ByteArray;
		$output->write_short(count($mercenariesDefs));

		foreach ($mercenariesDefs as $mercenariesDef)
		{
			$output->write_blob($mercenariesDef);

			foreach ($backpack as $item)
			{
				$output->write_short($size_bytes = 4);
				$output->write_short($weapon_id = $item[0]);
				$output->write_short($weapon_count = $item[1]);
			}
		}
	}

}