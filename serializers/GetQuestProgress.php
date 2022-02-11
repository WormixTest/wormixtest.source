<?

class GetQuestProgress
{
	static $command_id = 117;

	static function handle($callback, $user_id, $input)
	{
		$callback->log("Get Quest Progress");

		$quests =
			[
				[
					'id' => 1,
					'canStartNew' => true,
					'progress' => '[]',
					'rewarded' => false
				],
				[
					'id' => 2,
					'canStartNew' => true,
					'progress' => '{"finishWin": 1, "win": 0}',
					'rewarded' => false
				],
				[
					'id' => 3,
					'canStartNew' => true,
					'progress' => '{"buySkinForReagent":0,"unluckyCraftCounts":{},"moveProfileHistory":[]}',
					'rewarded' => false
				],
				[
					'id' => 4,
					'canStartNew' => true,
					'progress' => '{}',
					'rewarded' => false
				],
			];

		$output = new ByteArray;
		$output->write_short($quests_count = count($quests));

		foreach ($quests as $quest)
		{
			$output->write_short($bytes = 1);
			$quest = (object)$quest;

			$output->write_int($quest->id);
			$output->write_bool($quest->canStartNew);
			$output->write_utf($quest->progress);
			$output->write_bool($quest->rewarded);
		}

		$callback->socket_write(GetQuestProgressResult::$command_id, $output);
	}
}