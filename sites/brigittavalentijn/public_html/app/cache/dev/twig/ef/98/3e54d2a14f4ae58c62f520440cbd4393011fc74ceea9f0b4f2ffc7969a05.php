<?php

/* StefBVBundle:Default:index.html.twig */
class __TwigTemplate_ef983e54d2a14f4ae58c62f520440cbd4393011fc74ceea9f0b4f2ffc7969a05 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["car1"] = array("h1" => "<a href=\"http://brigittavalentijn.nl/nieuws/halloween-spooktocht-2014\">Halloween Spooktocht</a>", "active" => "active", "imageurl" => $this->env->getExtension('assets')->getAssetUrl("uploads/temp/halloween.jpg"), "imagealt" => "Halloween Spooktocht in Loosduinen", "body" => "<p>Zaterdag 1 november vanaf 18:00 uur aan de wijndalerweg! Zie ook onze <a href=\"https://www.facebook.com/brigittavalentijn\">Facebookpagina</a></p>");
        // line 2
        $context["car2"] = array("h1" => "Nieuwe website", "active" => "", "imageurl" => $this->env->getExtension('assets')->getAssetUrl("uploads/temp/logo-black.jpg"), "imagealt" => "BVLogo", "body" => "Wegens technische problemen is besloten een (deel van) de nieuwe website vroegtijdig online te zetten. De komende periode zal de nieuwe website langzaam aan u ontvouwen</p>");
        // line 3
        $context["car3"] = array("h1" => "Halloween Spooktocht", "active" => "", "imageurl" => $this->env->getExtension('assets')->getAssetUrl("uploads/temp/logo-black.jpg"), "imagealt" => "Halloween Spooktocht in Loosduinen", "body" => "<p>Zaterdag 1 november vanaf 18:00 uur aan de wijndalerweg! Zie ook onze <a href=\"https://www.facebook.com/brigittavalentijn\">Facebookpagina</a></p>");
        // line 4
        echo "
";
        // line 5
        $context["carouselItems"] = array(0 => (isset($context["car1"]) ? $context["car1"] : $this->getContext($context, "car1")), 1 => (isset($context["car2"]) ? $context["car2"] : $this->getContext($context, "car2")), 2 => (isset($context["car3"]) ? $context["car3"] : $this->getContext($context, "car3")));
        // line 6
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"../../favicon.ico\">

    <title>Scouting Brigitta / Valentijn</title>

    <!-- Bootstrap core CSS -->
    <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
    <!-- <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap/themes/superhero.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\"> -->
    <link href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap/carousel.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" mwwwedia=\"screen\">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
<!-- NAVBAR
================================================== -->
<body>
<!-- Carousel
================================================== -->
";
        // line 36
        $this->env->loadTemplate("StefBVBundle:Blocks:carousel.base.html.twig")->display($context);
        // line 37
        echo "
<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class=\"container marketing\">
    <!-- Three columns of text below the carousel -->
    <div class=\"row\">
        <div class=\"col-lg-4\">
            <a href=\"https://www.facebook.com/brigittavalentijn?fref=ts\"><img class=\"img-circle\" src=\"http://icons.iconarchive.com/icons/danleech/simple/256/facebook-icon.png\" alt=\"Generic placeholder image\" style=\"width: 140px; height: 140px;\"></a>
            <h2><a href=\"https://www.facebook.com/brigittavalentijn?fref=ts\">Facebook</a></h2>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
            <a href=\"http://brigittavalentijn.nl/over-ons/adres\"><img class=\"img-circle\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/temp/logo.jpg"), "html", null, true);
        echo "\" alt=\"Generic placeholder image\" style=\"width: 140px; height: 140px;\"></a>
            <h2><a href=\"http://brigittavalentijn.nl/over-ons/adres\">Adres</a></h2>
        </div><!-- /.col-lg-4 -->
        <div class=\"col-lg-4\">
            <a href=\"http://brigittavalentijn.nl/nieuws/technische-problemen-en-een-nieuwe-website\"><img class=\"img-circle\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/temp/logo.jpg"), "html", null, true);
        echo "\" alt=\"Generic placeholder image\" style=\"width: 140px; height: 140px;\"></a>
            <h2><a href=\"http://brigittavalentijn.nl/nieuws/technische-problemen-en-een-nieuwe-website\">Website</a></h2>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    ";
        // line 59
        $context["counter"] = 1;
        // line 60
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["newsitems"]) ? $context["newsitems"] : $this->getContext($context, "newsitems")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["newsitem"]) {
            // line 61
            echo "        ";
            if (((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) % 2 == 1)) {
                // line 62
                echo "            ";
                $context["position"] = "odd";
                // line 63
                echo "        ";
            } else {
                // line 64
                echo "            ";
                $context["position"] = "even";
                // line 65
                echo "        ";
            }
            // line 66
            echo "
        ";
            // line 67
            $this->env->loadTemplate("StefBVBundle:Blocks:news.item.index.html.twig")->display(array_merge($context, array("newsitem" => (isset($context["newsitem"]) ? $context["newsitem"] : $this->getContext($context, "newsitem")), "position" => (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")))));
            // line 68
            echo "
        ";
            // line 69
            $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) + 1);
            // line 70
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['newsitem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "
    <hr class=\"featurette-divider\">

    <footer>
        <p class=\"pull-right\"><a href=\"#\">Naar boven</a></p>
        <p>&copy; Brigitta-Valentijn - Aangeboden door <a href=\"http://stefanius.nl\">Stefanius.nl</a></p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->

<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
<script src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
<!-- Include all JavaScripts, compiled by Assetic -->
<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap_carousel_4.js"), "html", null, true);
        echo "\"></script>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "StefBVBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 89,  184 => 88,  179 => 86,  162 => 71,  148 => 70,  146 => 69,  143 => 68,  141 => 67,  138 => 66,  135 => 65,  132 => 64,  129 => 63,  126 => 62,  123 => 61,  105 => 60,  103 => 59,  95 => 54,  88 => 50,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 20,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
