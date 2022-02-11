<?

# добавление перса в свою комаду в окне гладиаторки
# (персы на выбор уже заранее сгенерированы)
# teamMemberIndex - выбранный индекс перса
class AddGladiatorTeamMember
{
	public static $command_id = 111;

	static function handle($callback, $user_id, $input)
	{
		$teamMemberIndex = $input->read_int();
		GetColiseumState::handle($callback, $user_id, $input);
	}
}