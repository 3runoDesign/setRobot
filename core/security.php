<?php
/**
 * Verificar se a constante ABSPATH está configurada antes de apresentar na rota,
 * caso não estiver configurada encaminha para home.
 *
 * @package  setRobot
 * @category setRobot/Security
 * @author   CCM
 * @version  1.0.0-alpha
 */
if (! defined('ABSPATH')) {
    header('Location: /');
    exit;
}
