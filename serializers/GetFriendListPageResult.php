<?

class GetFriendListPageResult
{
	static $command_id = 10018;

	static function deserialize($input, $version, $users, $users_ids)
	{
		$res = new stdClass;
		$res->profiles_count = count($users);
		$res->users_ids = $users_ids;
		return $res;
	}

}