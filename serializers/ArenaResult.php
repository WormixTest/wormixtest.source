<?

# результат открытия арены
class ArenaResult
{
	static $command_id = 10004;

	public static function deserialize($output, $version)
	{
		$battles_count = $output->read_int();
		echo "battles_count: $battles_count\n";
		$curSoloMissionId = $output->read_short();
		echo "curSoloMissionId: $curSoloMissionId\n";
		$curCooperativeMissionId = $output->read_short();
		echo "curCooperativeMissionId: $curCooperativeMissionId\n";
		$bossAvailable = $output->read_bool();
		echo "bossAvailable: $bossAvailable\n";

		if ($version >= '1.19')
		{
			$superBossAvaliable = $output->read_bool();
			echo "superBossAvaliable: $superBossAvaliable\n";
		}

		global $main;
		$main->arena($output);
	}
}