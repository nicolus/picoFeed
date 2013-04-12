<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Filter.php';

use PicoFeed\Filter;
use PicoFeed\Reader;

class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testIsRelativePath()
    {
        $f = new Filter('<a href="/bla/bla">link</a>', 'http://blabla');
        $this->assertTrue($f->isRelativePath('/bbla'));
        $this->assertTrue($f->isRelativePath('../../bbla'));
        $this->assertFalse($f->isRelativePath('http://google.fr'));
        $this->assertFalse($f->isRelativePath('//superurl'));
        $this->assertFalse($f->isRelativePath('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA
AAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO
9TXL0Y4OHwAAAABJRU5ErkJggg=='));
    }


    public function testEmptyTags()
    {
        $data = <<<EOD
<div>
<a href="file://path/to/a/file">
    <img src="http://example.com/image.png" />
</a>
</div>
EOD;
        $f = new Filter($data, 'http://blabla');
        $output = $f->execute();

        $this->assertEquals('<img src="http://example.com/image.png"/>', trim($output));
    }


    public function testIframe()
    {
        $data = <<<EOD
<iframe src="http://www.kickstarter.com/projects/lefnire/habitrpg-mobile/widget/video.html" height="480" width="640" frameborder="0"></iframe>
EOD;

        $f = new Filter($data, 'http://blabla');
        $this->assertEmpty($f->execute());

        $data = <<<EOD
<iframe src="http://www.youtube.com/bla" height="480" width="640" frameborder="0"></iframe>
EOD;

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals($data, $f->execute());
    }


    public function testSomething()
    {
        $data = <<<EOD
<body>
<p>
<a href="http://guybirenbaum.com/20130406/une-bonne-archive/" target="_blank">Guy Birenbaum est tombé</a> sur une archive, et parfois, ça fait mal...Il raconte sa chute :
</p>
<blockquote>
    <p> « Je suis un fouineur…</p>
    <p>[…]</p>
    <p>Alors forcément, je fouine…</p>
    <p>Vous savez que le site de l’Ina est ma folie.</p>
    <p>Donc je rentre des noms, des dates.</p>
    <p>Pour voir.</p>
    <p>Je remonte.</p>
    <p>Je descends.</p>
    <p>Ils devraient me donner un abonnement professionnel, vu la pub que je fais pour eux ! </p>
    <p>Alors, là, donc je fouillais…</p>
    <p>Et soudain, vers 1 minute 40, dans une vidéo, je tombe sur un député socialiste qui a un avis, et qui le donne, sur la démission de Roland Dumas du Conseil Constitutionnel (avant sa comparution devant le...</p>
</blockquote>
<img width='1' height='1' src='http://rue89.feedsportal.com/c/33822/f/608948/s/2a687021/mf.gif' border='0'/>
<div class='mf-related'>
<p>Articles en rapport</p>
<ul>
<li><a href='http://rue89.feedsportal.com/c/33822/f/608948/s/2a4c37e3/l/0L0Srue890N0C20A130C0A40C0A30Ccumul0Emandats0Ereforme0Ereportee0Ea0E20A170Elimiter0Ecasse0E241114/story01.htm'>Cumul des mandats : la réforme reportée à 2017 pour limiter la casse</a></li>
<li><a href='http://rue89.feedsportal.com/c/33822/f/608948/s/2a5e88e6/l/0L0Srue890N0C20A130C0A40C0A50Cjerome0Ecahuzac0Eveut0Erevenir0Ea0Elassemblee0Enationale0E241216/story01.htm'>Jérôme Cahuzac veut (et peut) revenir à l’Assemblée nationale</a></li>
</ul>
</div>
<div class='mf-viral'>
<table border='0'>
<tr>
<td valign='middle'>
<a href="http://res.feedsportal.com/...." target="_blank"><img src="http://rss.feedsportal.com/images/partagez.gif" border="0" /></a>
</td>
<td valign='middle'>
<a href="http://res.feedsportal.com/..." target="_blank"><img src="http://rss.feedsportal.com/images/bookmark.gif" border="0" /></a>
</td>
</tr>
</table>
</div>
<br/>
<br/>
<a href="http://da.feedsportal.com/r/162676227447/u/0/f/608948/c/33822/s/2a687021/a2.htm">
<img src="http://da.feedsportal.com/r/162676227447/u/0/f/608948/c/33822/s/2a687021/a2.img" border="0"/></a>
<img width="1" height="1" src="http://pi.feedsportal.com/r/162676227447/u/0/f/608948/c/33822/s/2a687021/a2t.img" border="0"/>
</body>
EOD;



        /*$reader = new Reader(file_get_contents('tests/fixtures/rue89.xml'));

        $parser = $reader->getParser();

        if ($parser !== false) {

            $feed = $parser->execute();

            var_dump($feed->items[0]);
        }*/
    }
}