<?

class PVPProfile
{
	static function serialize
	(
		$output,
		$user
	)
	{
		$backpackConf = [];
		$output->write_short_array($backpackConf);

		if ($user->version >= '1.35')
		{
			if ($user->version >= '1.40')
				TeamMember::serialize($output, $user);

			$seasonsBestRank = [];
			$output->write_byte_array($seasonsBestRank);
		}
	}
}