<?

class Chest
{
	static $command_id = 102;

	static function handle($callback, $user_id, $input)
	{
		$reagents = UsersModel::get_reagents($user_id);
		$reagents[51]--;
		UsersModel::set_reagents($user_id, $reagents);

		$output = new ByteArray;

		$output->write_short($equip_id);
		$output->write_int($weapon_id);
		$output->write_int($weapon_count);

		$output->write_int($ruby_count);
		$output->write_short($recipeId = 0);
		$output->write_short($result = 0);
	}
}