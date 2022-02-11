<?

# начиная с версии 1.32 у него поменялся id со 104 на 128
# при этом id 104 стал свободным
class SetHotkeys2
{
	public static $command_id = 128;

	static function handle($callback, $user_id, $input)
	{
		SetHotkeys::handle($callback, $user_id, $input);
	}
}