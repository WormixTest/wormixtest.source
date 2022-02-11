<?

# ВНИМАНИЕ! Пакет ответа может быть битым при неправильном типе сокета, см. заголовок у GameSocket
class GetFriendListPage
{
	static $command_id = 18;

	static function handle($callback, $user_id, $input)
	{
		$page_index = $input->read_int();
		$users = $callback->friends[$user_id][$page_index] ?? [];
		return $users;
	}

	static function deserialize($input, $version)
	{
		$list = new GetFriendListPage;
		$list->page_index = $input->read_int();
		return $list;
	}

}