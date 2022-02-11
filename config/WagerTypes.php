<?

# Типы ставок
class WagerTypes
{
	# Нуль при вызове на бесплатную дуэль c другом или против командного босса
	# Тогда для определения того, что это супербосс можно посмотреть на массив mission_ids
	# После десерелизации
	const BATTLE_WAGER_GLOBAL = 0;
	const BATTLE_WAGER_15_DUEL = 1;
	const BATTLE_WAGER_300_DUEL = 3;
	const BATTLE_WAGER_50_2x2_FRIENDS = 4;
	const BATTLE_WAGER_50_3_FOR_ALL = 5;
	const BATTLE_WAGER_50_2x2 = 7;
	const BATTLE_WAGER_GLADIATOR = 8;
}