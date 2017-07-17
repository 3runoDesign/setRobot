<?php

namespace SetRobot;

use Composer\Script\Event;

class PostCreateProject
{

    public static function updateHeaders(Event $event)
    {
        // @codingStandardsIgnoreStart
        $io = $event->getIO();
        if ($io->isInteractive()) {
            $io->write('<info>Define theme headers. Press enter key for default.</info>');
            $theme_headers_default = [
                'name'        => 'SetRobot Starter Theme',
                'uri'         => 'https://github.com/3runoDesign/setRobot/',
                'description' => 'SetRobot is a WordPress starter theme.',
                'version'     => '2.0.0',
                'author'      => 'Bruno Fernando',
                'author_uri'  => 'https://github.com/3runoDesign/'
            ];
            $theme_headers = [
              'name'        => $io->ask('<info>Theme Name [<comment>'.$theme_headers_default['name'].'</comment>]:</info> ', $theme_headers_default['name']),
              'uri'         => $io->ask('<info>Theme URI [<comment>'.$theme_headers_default['uri'].'</comment>]:</info> ', $theme_headers_default['uri']),
              'description' => $io->ask('<info>Theme Description [<comment>'.$theme_headers_default['description'].'</comment>]:</info> ', $theme_headers_default['description']),
              'version'     => $io->ask('<info>Theme Version [<comment>'.$theme_headers_default['version'].'</comment>]:</info> ', $theme_headers_default['version']),
              'author'      => $io->ask('<info>Theme Author [<comment>'.$theme_headers_default['author'].'</comment>]:</info> ', $theme_headers_default['author']),
              'author_uri'  => $io->ask('<info>Theme Author URI [<comment>'.$theme_headers_default['author_uri'].'</comment>]:</info> ', $theme_headers_default['author_uri'])
            ];
            file_put_contents('resources/style.css', str_replace($theme_headers_default, $theme_headers, file_get_contents('resources/style.css')));
        }
    }

  public static function buildOptions(Event $event)
  {
    $io = $event->getIO();

    if ($io->isInteractive()) {
      $io->write('<info>Configure build settings. Press enter key for default.</info>');

      $browsersync_settings_default = [
        'proxy'        => 'setrobot.dev'
      ];

      $browsersync_settings = [
        'proxy'        => $io->ask('<info>Local development URL of WP site [<comment>'.$browsersync_settings_default['proxy'].'</comment>]:</info>', $browsersync_settings_default['proxy'])
      ];

      file_put_contents('gulpTasks/config/browserSync.js', str_replace($browsersync_settings_default['proxy'], $browsersync_settings['proxy'], file_get_contents('gulpTasks/config/browserSync.js')));
    }
  }
}
