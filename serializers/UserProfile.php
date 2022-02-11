<?

/* test
Если есть улучшения, но нет самих оружек - в арсе появятся улучшенные оружки и
визуально в крафте все будет норм,
при разборке тоже, только после обновы не будет основной оружки

Порядок отправки улучшений не имеет значения 11,12 == 12,11

Если промежуточного улучшения в линейной цепи или в цепи с выбором
(цепь с выбором может быть внутри линейной цепи),
то плагин зависнет
*/

class UserProfile
{
	use log;

	static $last_version = '1.75';
	static $main;

	static function bridge($method, ...$params)
	{
		static::$main->write
		((object)[
			'action' => self::class
			, 'method' => $method
			, 'params' => $params
		]);
		return static::$main->readSyncJSON();
	}

	static function correct_int_array($arr)
	{
		return static::bridge(__FUNCTION__, $arr);
	}

	static function is_available_add_recipe($recipe_id, $recipes)
	{
		return static::bridge(__FUNCTION__, $recipe_id, $recipes);
	}

	static function unset_unavailable_stuff($stuff, $version = null)
	{
		return static::bridge(__FUNCTION__, $stuff, $version);
	}

	static function unset_unavailable_weapons($weapons, $version = null)
	{
		return static::bridge(__FUNCTION__, $weapons, $version);
	}

	static function check_hat_available($hat_id, $version = null)
	{
		return static::bridge(__FUNCTION__, $hat_id, $version);
	}

	static function check_artifact_available($artifact_id, $version = null)
	{
		return static::bridge(__FUNCTION__, $artifact_id, $version);
	}

	static function check_race_available($race_id, $version = null)
	{
		return static::bridge(__FUNCTION__, $race_id, $version);
	}

	static function unset_unavailable_recipes($recipes, $version = null)
	{
		return static::bridge(__FUNCTION__, $recipes, $version);
	}

	static function get_available_weapons_prices($uversion = null)
	{
		return static::bridge(__FUNCTION__, $uversion);
	}

	static function get_available_stuff_prices($uversion = null)
	{
		return static::bridge(__FUNCTION__, $uversion);
	}

	static function get_available_weapons($uversion = null)
	{
		return static::bridge(__FUNCTION__, $uversion);
	}

	static function get_available_recipes($uversion = null)
	{
		return static::bridge(__FUNCTION__, $uversion);
	}

	# null_values - зануляет опасные значения, которые могут вызвать крах плеера
	static function serialize
	(
		$output,
		$res,
		$real_name = true,
		$null_values = false
	)
	{
		# обозначает размер всех байтов профиля
		# прямо в дисериалайзере стоит stream.readShort(); и читает 2 байта в никуда, ттак что можно что угодно поставить
		$output->write_short(0);

		$output->write_int($res->user_id);
		$output->write_int($res->fuzes);
		$output->write_int($res->rubins);
		$output->write_int($res->rating);

		if (!isset($res->major_version))
			$res->major_version = substr
			(
				$res->version,
				0,
				4
			);

		#$res->stuff = [];

		if ($null_values)
			$res->stuff = $res->weapons = $res->recipes = [];
		else
		{
			/*
			echo "testing start\n";
			$val = [78 => -1, 52 => -1, 2 => 5];
			self::unset_unavailable_weapons($val, $res->major_version);
			var_dump($val);
			die("dw\n");
			*/
		}

		# нужно решить непонятный баг с большим id (4294967281), вследивсии чего юзер невалиден
		# [{"user_id":4294967281,"type":1,"active":1},{"user_id":4294967284,"type":1,"active":1}]
		foreach ($res->team as $key => $member)
			if
			(
				!isset($member->armor)
				|| !isset($member->user_id)
			)
				unset($res->team[$key]);

		# если в команде больше 4х, то
		# в версиях, где поддерживается только 4 перса
		# нельзя зайти в гардероб, но командная
		# комната работает (просто не отображаются если за пределами)
		if ($res->version <= '1.30')
			array_splice($res->team, 4);

		# в хэллоуинской версии новые косяки, почему-то умножить на 2
		# а вот в в 1.39 (январь 2017-й) опять убрали
		if
		(
			$res->version >= '1.28' &&
			$res->version <= '1.38'
		)
			$weapon_record_list_size = count($res->weapons) * 2;
		else
			$weapon_record_list_size = count($res->weapons);

		$output->write_short($weapon_record_list_size);

		if ($res->weapons)
			foreach ($res->weapons as $weapon_id => $value)
			{
				$output->write_short($weapon_id);
				$output->write_short($value);

			}

		$output->write_short(count($res->stuff));

		if ($res->stuff)
			foreach ($res->stuff as $stuff_id)
				$output->write_short($stuff_id);

		if ($res->version >= '1.10')
		{
			$output->write_int($clan_id = 1);
			$output->write_utf($res->clan_name);

			$clan_emblems = [19, 9, 3, 6];
			$output->write_short(count($clan_emblems));

			if ($res->version >= '1.34')
			{
				$output->write_int($rank_points = 7);
				$output->write_byte($best_rank = 20);
			}
		}
	}
}

global $main;
UserProfile::$main = $main;