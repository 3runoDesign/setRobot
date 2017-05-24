<?php

namespace SetRobot;

use Composer\Script\Event;

class PostCreateProject
{
  public static function buildOptions(Event $event)
  {
    $io = $event->getIO();

    if ($io->isInteractive()) {
      $io->write('<info>Configure build settings. Press enter key for default.</info>');

      $browsersync_settings_default = [
        'proxy'        => 'http://setrobot.dev'
      ];

      $browsersync_settings = [
        'proxy'        => $io->ask('<info>Local development URL of WP site [<comment>'.$browsersync_settings_default['proxy'].'</comment>]:</info>', $browsersync_settings_default['proxy'])
      ];

      file_put_contents('gulpTasks/config/browserSync.js', str_replace($browsersync_settings_default['proxy'], $browsersync_settings['proxy'], file_get_contents('gulpTasks/config/browserSync.js')));
    }
  }
}
