<?php

namespace xPrim69x\Trash;

use muqsit\invmenu\InvMenuHandler;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

	public function onEnable(){
		$this->saveDefaultConfig();
		if(!InvMenuHandler::isRegistered()) InvMenuHandler::register($this);
		$this->getServer()->getCommandMap()->register($this->getName(), new TrashCommand($this->getConfig()));
	}

}
