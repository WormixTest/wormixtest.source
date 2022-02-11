<?

class StartBattle
{
	static $command_id = 6;

	static function handle($callback, $user_id, $input)
	{
		$misssion_id = $input->read_short();

		$battles_count = UsersModel::get_battles($user_id);

		if ($battles_count <= 0 || $battles_count > 999)
			$battles_count = 999;

		$battles_count--;
		UsersModel::set_battles($user_id, $battles_count);

		$output = new ByteArray;
		# ранее отправлялась структура оружек, непонятно зачем
		if ($callback->versions[$user_id] < '1.34')
			$output->write_short($weaponStructureSize = 0);

		if (isset($callback->profiles[$user_id]))
			$battleId = $callback->profiles[$user_id]->battleId;
		else
			$battleId = 1;

		$output->write_int($battleId);
		$output->write_byte(255);
		$output->write_byte(255);
		$output->write_byte(255);
		$callback->ssocket_write(StartBattleResult::$command_id, $output);
	}
}