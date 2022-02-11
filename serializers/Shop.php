<?

/*
 Внимание! В ранних версиях покупка осуществлялась только после закрытия магазина,
Например в 1.26 можно было покупать много, но пакеты не шли, только после закрытия магазина
 */

class Shop
{
	static $command_id = 3;

	static function handle($callback, $user_id, $input)
	{
		$item_size = $input->read_short();

		$output = new ByteArray;
		$output->write_short(0);
		$output->write_short($item_size);

		$i = 0;

		$weapons = UsersModel::get_weapons($user_id);
		$stuff = UsersModel::get_stuff($user_id);

		# это условие важно, если нет версии - то данные х.з. куда запишутся,
		# а при оторажении этого юзера у других в юзерлисте может крашиться плагин
		if (!$callback->versions[$user_id])
			return;

		# вид 0.00
		$user_version = substr($callback->versions[$user_id], 0, 4);

		$availible_weapons_prices = UserProfile::get_available_weapons_prices($user_version);
		$availible_stuff_prices = UserProfile::get_available_stuff_prices($user_version);

		while ($i < $item_size)
		{
			# size
			$output->write_short(8);
			$output->write_int($item_id);
			$output->write_int($value);

			$callback->log("item id $item_id");

			if
			(
				($item_id < 210)
				|| ($item_id == 10059)
				|| ($item_id == 10061)
			)
			{
				$prices = $availible_weapons_prices[$item_id];
				$price = $prices[($money_type - 1) * -1];

				$callback->log("prices:", $prices);

				if (!$prices || !$price)
				{
					$price = 0;
					$callback->syslog("[WARNING] weapon not exists:", $item_id);
				}

				@$weapons[$item_id] += $value;

				$callback->log("call UsersModel::set_weapons", $weapons);
				UsersModel::set_weapons($user_id, $weapons);
			}
		}

		$output->write_short($stuffsize = 0);
		$output->write_short($temporalstuff_size = 0);
	}
}