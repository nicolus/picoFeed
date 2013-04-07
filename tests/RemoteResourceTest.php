<?php

require_once 'lib/PicoFeed/RemoteResource.php';

use PicoFeed\RemoteResource;

class RemoteResourceTest extends PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->execute();

        $this->assertTrue($resource->isModified());
        $this->assertNotEmpty($resource->getContent());
        $this->assertNotEmpty($resource->getEtag());
        $this->assertNotEmpty($resource->getLastModified());
    }


    public function testCacheEtag()
    {
        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->execute();
        $etag = $resource->getEtag();

        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->setEtag($etag);
        $resource->execute();

        $this->assertFalse($resource->isModified());
    }


    public function testCacheLastModified()
    {
        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->execute();
        $lastmod = $resource->getLastModified();

        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->setLastModified($lastmod);
        $resource->execute();

        $this->assertFalse($resource->isModified());
    }


    public function testCacheBoth()
    {
        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->execute();
        $lastmod = $resource->getLastModified();
        $etag = $resource->getEtag();

        $resource = new RemoteResource('http://websites/petitcodeur/output/feed.xml');
        $resource->setLastModified($lastmod);
        $resource->setEtag($etag);
        $resource->execute();

        $this->assertFalse($resource->isModified());
    }
}