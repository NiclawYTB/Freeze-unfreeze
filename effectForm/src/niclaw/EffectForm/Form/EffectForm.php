<?php

namespace niclaw\EffectForm\Form;

use jojoe77777\FormAPI\SimpleForm;


use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\HealthBoostEffect;
use pocketmine\entity\effect\InstantHealthEffect;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\Location;
use pocketmine\player\Player;
use pocketmine\Server;

class Form
{
    public static function FormSendEffect(Player $player): void
    {
        $form = new SimpleForm(function (Player $player, $data = null) {
            if (is_null($data)) return;

            switch ($data) {
                case 0:
                    $player->getEffects(new EffectInstance(VanillaEffects::HEALTH_BOOST(), 0, 200, false));
                    $player->sendToastNotification("informations des effects", "vous avez bien eu un HealBoost");
                    break;
                case 1:
                   $player->getEffects(new EffectInstance(VanillaEffects::SPEED(), 20, 2, false));
                    $player->sendToastNotification("informations des effects", "vous avez bien eu un effect de Speed");
                   break;
                case 2:
                    $player->getEffects(new EffectInstance(VanillaEffects::HASTE(), 20, 2, false));
                    $player->sendToastNotification("informations des effects", "vous avez bien eu un effect de haste");
                    break;
                case 3:
                    $player->sendToastNotification("informations: ", "vous devez ajouter un effect dans le plugin");
                    break;
                case 4:
                    $player->sendToastNotification("informations: ", "vous devez ajouter un effect dans le plugin");
                    break;
                case 5:
                    $player->sendToastNotification("informations: ", "vous devez ajouter un effect dans le plugin");
                    break;
            }
        });

        $form->setTitle("§4warp");
        $form->addButton("§4heal", 0, "textures/items/emerald");
        $form->addButton("§4Speed", 0, "textures/items/emerald");
        $form->addButton("§4Haste", 0, "textures/items/emerald");
        $form->addButton("§4soon", 0, "textures/items/emerald");
        $form->addButton("§4soon", 0, "textures/items/emerald");
        $form->addButton("§4soon", 0, "textures/items/emerald");

        $form->sendToPlayer($player);
    }
}