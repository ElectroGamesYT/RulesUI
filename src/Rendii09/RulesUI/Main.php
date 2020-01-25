<?php

namespace Rendii09\RulesUI;

/*
 *
 * RulesUI, a plugin for PocketMine-MP
 * Copyright (c) 2020 Rendii09  <rendiansyahbagus@gmail.com>
 *
 * Poggit: https://poggit.pmmp.io/ci/Rendii09/
 * Github: https://github.com/Rendii09
 *
 * This software is distributed under "GNU General Public License v3.0".
 * This license allows you to use it and/or modify it but you are not at
 * all allowed to sell this plugin at any cost. If found doing so the
 * necessary action required would be taken.
 *
 * RulesUI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License v3.0 for more details.
 *
 * You should have received a copy of the GNU General Public License v3.0
 * along with this program. If not, see
 * <https://opensource.org/licenses/GPL-3.0>.
 *
 */

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\utils\TextFormat as C;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener{

   public function onEnable(){
       $this->getLogger()->info(C::GREEN . "Enable!");
       
       @mkdir($this->getDataFolder());
       $this->saveDefaultConfig();
       $this->getResource("config.yml");
   }

   public function onDisable(){
       $this->getLogger()->info(C::RED . "Disable!");
   }

   public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
       switch($command->getName()){
           case "rules":
               if(!($sender instanceof Player)){
                    $sender->sendMessage($this->getConfig()->get("use_in_game"));
                      return true;
               }
           $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
           $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
               $result = $data;
               if ($result == null) {
               }
               switch ($result) {
                     case 0:

                     break;
                     }
               });
               $form->setTitle($this->getConfig()->get("title"));
               $form->setContent($this->getConfig()->get("description"));
               $form->addButton($this->getConfig()->get("button"));
               $form->sendToPlayer($sender);
               }
               return $form;
   }
}
