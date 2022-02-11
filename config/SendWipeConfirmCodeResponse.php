<?

class SendWipeConfirmCodeResponse
{
	const OK = 0;
	const DAILY_LIMIT_EXCEEDED = 1;
	const TODAY_ALREADY_WIPED = 2;
	const WRONG_MOBILE_NUMBER = 3;
	const ERROR = 3;
}