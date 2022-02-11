<?

class ToggleTeamMember
{
	static $command_id = 106;

	static function handle($callback, $user_id, $input)
	{
		$member_id = $input->read_int();
		$active = $input->read_bool();
		UsersModel::toggle_team_member($user_id, $member_id);
	}
}