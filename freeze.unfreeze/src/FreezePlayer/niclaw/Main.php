<?php

namespace FreezePlayer\niclaw;

use FreezePlayer\niclaw\command\staff\freeze\freeze;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

    public function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§2Le Plugin FormEffect est activé");

        $this->getServer()->getCommandMap()->registerAll('commands', [
            new freeze()
        ]);
    }

    public function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§2Le Plugin FormEffect est desactivé");
    }


}
