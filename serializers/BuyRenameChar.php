<?

# начиная с 1.31 можно переименовывать персов в команде
class BuyRenameChar
{
	static $command_id = 119;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;
		$teamMemberId = $input->read_int();
		$name = $input->read_utf();
		$moneyType = $input->read_short();

		UsersModel::BuyRenameChar($user_id, $teamMemberId, $name);
	}
}