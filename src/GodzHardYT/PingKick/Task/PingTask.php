<?php

namespace GodzHardYT\PingKick\Task;

use GodzHardYT\PingKick\Main;
use pocketmine\player\Player;
use pocketmine\scheduler\Task;
use pocketmine\network\mcpe\NetworkSession;

class PingTask extends Task {

    private $plugin;

    public function __construct(Main $main) {
        $this->plugin = $main;
    }

    /**
     * @inheritDoc
     */
    public function onRun(): void {
        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
            if ($player->getNetworkSession()->getPing() >= $this->plugin->getConfig()->get("Ping-Kick")) {
                $player->kick($this->plugin->getConfig()->get("Kick-Message"));
            }
        }
    }

}