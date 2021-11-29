<?php

namespace GodzHardYT\PingKick;

use GodzHardYT\PingKick\Task\PingTask;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable() : void {
        $this->saveDefaultConfig();
        $this->getScheduler()->scheduleRepeatingTask(new PingTask($this), 20);
    }

}
