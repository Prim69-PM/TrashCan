<?php

namespace xPrim69x\Trash;

use muqsit\invmenu\InvMenu;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\Config;

class TrashCommand extends Command {

	private $config;

	public function __construct(Config $config){
		parent::__construct(
			"trash",
			"Opens a trash can to throw your garbage in!"
		);

		$this->config = $config;
		$this->setAliases($config->get("aliases"));
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		if(!$sender instanceof Player){
			$sender->sendMessage("Use this command in-game!");
			return;
		}

		$config = $this->config;
		$msg = $config->get("message") ?? "[!] Opening trash can!";
		if($config->get("message-type") === "tip"){
			$sender->sendTip($msg);
		} else {
			$sender->sendMessage($msg);
		}

		InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST)->setName($config->get("trash-name"))->send($sender);
	}

}