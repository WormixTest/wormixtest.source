<?

# в 1.4-1.7 используется старая Arena
# неизвестно про 1.8.-1.9
# в 1.10 уже используется Arena2
class Arena2
{
	public static $command_id = 708;

	static function handle($callback, $user_id, $input)
	{
		Arena::handle($callback, $user_id, $input);
	}
}