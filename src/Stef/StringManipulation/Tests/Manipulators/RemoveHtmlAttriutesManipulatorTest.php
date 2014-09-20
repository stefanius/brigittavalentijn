<?php

namespace Stef\StringManipulation\Tests\Manipulators;

use Stef\StringManipulation\Manipulators\FullpathSlugManipulator;
use Stef\StringManipulation\Manipulators\RemoveHtmlAttributesManipulator;
use Stef\StringManipulation\Manipulators\SlugManipulator;

class RemoveHtmlAttributesManipulatorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provider
     */
    public function testSlugManipulator($string, $expected) {
        $manipulator = new RemoveHtmlAttributesManipulator();

        $result = $manipulator->manipulate($string);

        $this->assertEquals($expected, $result);
    }

    public function provider() {
        return [
            ["&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;Zoals u weet loopt 15 juli ons verblijf aan de Mient af. De afgelopen maanden zijn we dan ook druk in overleg geweest met de Gemeente en het is gelukt om goede en permanente locaties te vinden.&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;Een eigen groepsruimte zoals we gewend waren bleek er al snel niet meer in te zitten. De Gemeente stoot steeds meer wijkcentra af en in de buurt kwamen we uit op medegebruik of huur in ruimtes van andere verenigingen. Totdat de gemeente met het aanbod kwam aan de &lt;strong&gt;Wijndaelerweg 12&lt;/strong&gt;. Ook al is dit ver uit de buurt, we vonden het de moeite van het bekijken waard. Dat bleek ook bij ons eerste bezoek. De omgeving van het huis is om van te dromen als scoutinggroep. Het terrein om de huizen is al flink, maar van het terrein af ga je linksom park Ockenburgh in, waar je geweldig scoutingspel kan spelen, en rechtsom loop je binnen 10 minuten naar het strand. Bovendien krijgen de gebouwen een permanente scouting bestemming en de Brigitta/Valentijn kan er dus ook permanent in blijven. Onze grote droom, een eigen clubhuis, werd ons zo in de schoot geworden. Het bestuur is echter ook van mening dat de Brigitta/Valentijn hoort in de Bomen/vruchtenbuurt en die connectie willen we graag behouden. Daarom hebben we die gezocht en gevonden op het &lt;strong&gt;Stokroosveld&lt;/strong&gt; bij handbalclub Hermes. Deze club speelt op zondag, dus op zaterdag is hun ruimte beschikbaar.&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;&lt;br /&gt;
De Gemeente gaat akkoord met beide opties! En dat maakt voor ons het hoogst haalbare plaatje compleet. De Bevers en de Esta&rsquo;s kunnen met ingang van het nieuwe seizoen terecht op het Stokroosveld en de Mercator, Rowan/Sherpa&rsquo;s en Pivo&rsquo;s aan de Wijndaelerweg.&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;&lt;br /&gt;
12 juli gaan wij al het materiaal verhuizen van de Mient naar de Wijndaelerweg. Deze locatie zal het komend seizoen worden opgeknapt m.b.v. een subsidie van de Gemeente Den Haag, aangevuld door fondsen. De komende maand worden offertes opgevraagd en hiermee worden fondsen aangeschreven. De bedoeling is dat een deel van de exploitatie na het opknappen wordt terugverdiend door verhuur aan andere scoutinggroepen.&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;Doordat al ons materiaal vanaf 12 juli op de Wijndaelerweg staat zullen voor het zomerkamp de &lt;strong&gt;Mercators en Esta&rsquo;s op 19 juli vertrekken&lt;/strong&gt; vanaf de Wijndaelerweg en ook daar, samen met de Bevers, aankomen op &lt;strong&gt;26 juli&lt;/strong&gt;. U kunt dan ook meteen de locatie zien en helpen met in en uitladen.&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;

&lt;p&gt;Zowel de 1&lt;sup&gt;e&lt;/sup&gt; keer draaien na de zomer, op&amp;nbsp; &lt;strong&gt;13 september&lt;/strong&gt;, als het overvliegen op &lt;strong&gt;20 september&lt;/strong&gt; doen we met alle groepen op het stokroosveld (ingang Zonnebloemstraat). Exacte tijden en andere momenten volgen in een latere informatiebrief.&amp;nbsp;&lt;/p&gt;

&lt;p&gt;\r\n&lt;/p&gt;", "the-black-lazy-brown-fox"],
        ];
    }
}
