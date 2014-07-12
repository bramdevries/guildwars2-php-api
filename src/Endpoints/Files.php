<?php

namespace GuildWars2\Endpoints;

use GuildWars2\Abstracts\AbstractEndpoint;

class Files extends AbstractEndpoint
{

    private $renderUrl = 'https://render.guildwars2.com/file/%s/%d.%s';

    /**
     * Returns commonly requested in-game assets that may be used to enhance API-derived applications.
     *
     * @return array
     */
    public function files()
    {
        return $this->getResponse('files');
    }

    /**
     * Generate the URL to an asset
     *
     * @param  string $signature The file signature to be used with the render service.
     * @param  string $file_id   The file id to be used with the render service.
     * @param  string $format    The format to be used: png or jpg
     * @return string
     */
    public function file($signature, $file_id, $format = 'png')
    {
        return sprintf($this->renderUrl, $signature, $file_id, $format);
    }
}
