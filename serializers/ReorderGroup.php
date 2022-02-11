<?

class ReorderGroup
{
	static $command_id = 22;

	static function handle($callback, $user_id, $input)
	{
		$reorder_ids = $input->read_int_array();
		$team = UsersModel::get_team($user_id);

		foreach ($reorder_ids as $reorder_id)
			foreach ($team as $key => $member)
				if ($member->user_id == $reorder_id)
					$reorder_team[] = $member;

		$output->write_short(ReorderGroupResult::SUCCESS);
	}
}