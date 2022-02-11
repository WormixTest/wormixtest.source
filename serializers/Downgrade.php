<?

class Downgrade
{
	static $command_id = 88;

	static function handle($callback, $user_id, $input)
	{
		$recipe_id = $input->read_short();
		$recipes = UsersModel::get_recipes($user_id);
		$key = array_search($recipe_id, $recipes);
		unset($recipes[$key]);
	}

}