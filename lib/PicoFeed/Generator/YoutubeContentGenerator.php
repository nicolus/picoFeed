<?php

namespace PicoFeed\Generator;

use PicoFeed\Base;
use PicoFeed\Parser\Item;

/**
 * Youtube Content Generator
 *
 * @package PicoFeed\Generator
 * @author  Frederic Guillot
 */
class YoutubeContentGenerator extends Base implements ContentGeneratorInterface
{
    /**
     * Execute Content Generator
     *
     * @access public
     * @param  Item $item
     * @return boolean
     */
    public function execute(Item $item)
    {
        if ($item->hasNamespace('yt')) {
            return $this->generateHtml($item);
        }

        return false;
    }

    /**
     * Generate HTML
     *
     * @access public
     * @param  Item $item
     * @return boolean
     */
    private function generateHtml(Item $item)
    {
        $videoId = $item->getTag('yt:videoId');

        if (! empty($videoId)) {
            $item->setContent('<iframe width="560" height="315" src="//www.youtube.com/embed/'.$videoId[0].'" frameborder="0"></iframe>');
            return true;
        }

        return false;
    }
}
