<?

class SelectStuff
{
	static $command_id = 25;

	static function handle($callback, $user_id, $input)
	{
		$output = new ByteArray;

		if ($callback->versions[$user_id] > '1.11')
		{
			$length = $input->read_short();
			$output->write_short($length);

			for ($i = 0; $i < $length; $i++)
			{
				$len = $input->read_short();
				$member_id = $input->read_int();
				$hat_id = $input->read_short();
				$artifact_id = $input->read_short();

				UsersModel::select_stuff
				(
					$user_id,
					$member_id,
					$hat_id,
					$artifact_id
				);

				$output->write_short(12);
				$output->write_int($member_id);
			}

			$callback->ssocket_write
			(
				SelectStuffResult::$command_id,
				$output
			);
		}
		# для 1.11.0.0
		else
		{
			$hat_id = $input->read_short();
			# off_hand_id - название артефакта в руке
			$off_hand_id = $input->read_short();
			UsersModel::select_stuff
			(
				$user_id,
				$user_id,
				$hat_id,
				$off_hand_id
			);

			$output->write_short(SelectStuffResult::SUCCESS);
			$output->write_short($hat_id);
			$output->write_short($off_hand_id);

			$callback->ssocket_write
			(
				SelectStuffResult::$command_id,
				$output
			);
		}
	}
}