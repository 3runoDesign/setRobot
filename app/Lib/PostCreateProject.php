<?php

namespace App\Lib;

use Composer\Script\Event;

class PostCreateProject
{

    public static function updateHeaders(Event $event)
    {
        // @codingStandardsIgnoreStart
        $io = $event->getIO();

        if ($io->isInteractive()) {
            $io->write('<info>Define the theme variables. Press the Enter key by default.</info>');

            $contentFileProxy = file_exists('.env') ? file_get_contents(".env") : file_get_contents(".env-example");

            $contentFileStyle = file_get_contents("resources/style.css");

            $proxyDefault = [
                'proxy' => "http://setrobot.dev"
            ];

            $themeHeadersDefault = [
                'name'        => 'SetRobot Starter Theme',
                'uri'         => 'https://github.com/3runoDesign/setRobot/',
                'description' => 'SetRobot is a WordPress starter theme.',
                'version'     => '3.0.0',
                'author'      => 'Bruno <bruno2fernando@gmail.com>',
                'author_uri'  => 'https://github.com/3runoDesign/'
            ];

            $themeHeadersNew = [
                'name'        => $io->ask('<info>Theme Name [<comment>'.$themeHeadersDefault['name'].'</comment>]:</info> ', $themeHeadersDefault['name']),
                'uri'         => $io->ask('<info>Theme URI [<comment>'.$themeHeadersDefault['uri'].'</comment>]:</info> ', $themeHeadersDefault['uri']),
                'description' => $io->ask('<info>Theme Description [<comment>'.$themeHeadersDefault['description'].'</comment>]:</info> ', $themeHeadersDefault['description']),
                'version'     => $io->ask('<info>Theme Version [<comment>'.$themeHeadersDefault['version'].'</comment>]:</info> ', $themeHeadersDefault['version']),
                'author'      => $io->ask('<info>Theme Author [<comment>'.$themeHeadersDefault['author'].'</comment>]:</info> ', $themeHeadersDefault['author']),
                'author_uri'  => $io->ask('<info>Theme Author URI [<comment>'.$themeHeadersDefault['author_uri'].'</comment>]:</info> ', $themeHeadersDefault['author_uri'])
            ];

            $proxyNew = [
                'proxy' => $io->ask('<info>Proxy [<comment>'.$proxyDefault['proxy'].'</comment>]:</info> ', $proxyDefault['proxy']),
            ];

            $newStyleStr = str_replace($themeHeadersDefault, $themeHeadersNew, $contentFileStyle );

            file_put_contents("resources/style.css", $newStyleStr );

            $newProxyStr = str_replace($proxyDefault, $proxyNew, $contentFileProxy );

            file_put_contents(file_exists('.env') ? ".env" : ".env-example", $newProxyStr );

        }
    }
}
