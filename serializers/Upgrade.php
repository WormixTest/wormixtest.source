<?

/*
нельзя пропускать предыдущие номера крафта, но при этом
порядок номеров крафта в массиве не имеет значения
 */

class Upgrade
{
	static $command_id = 86;

	static function handle($callback, $user_id, $input)
	{
		$recipes = UsersModel::get_recipes($user_id);
		$recipes = array_unique($recipes);
		sort($recipes);

		$recipe_id = $input->read_short();

		# проверяем можно ли добавить улучшение с таким id
		if (UserProfile::is_available_add_recipe($recipe_id, $recipes))
		{
			$recipes[] = $recipe_id;
			sort($recipes);
			UsersModel::set_recipes($user_id, $recipes);
			$callback->ssocket_write(UpgradeResult::$command_id, $recipes);
		}
		else
		{
			$callback->log("bad upgrade, shutdown socket");
			$callback->socket_shutdown();
		}
	}
}