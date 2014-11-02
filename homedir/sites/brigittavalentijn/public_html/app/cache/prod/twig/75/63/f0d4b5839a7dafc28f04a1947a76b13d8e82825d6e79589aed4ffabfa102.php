<?php

/* StefBVBundle:Blocks:carousel.item.html.twig */
class __TwigTemplate_7563f0d4b5839a7dafc28f04a1947a76b13d8e82825d6e79589aed4ffabfa102 extends Twig_Template
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
        echo "<div class=\"item ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "active"), "html", null, true);
        echo "\">

    ";
        // line 3
        if ($this->getAttribute((isset($context["car"]) ? $context["car"] : null), "imageurl", array(), "any", true, true)) {
            // line 4
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "imageurl"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "imagealt"), "html", null, true);
            echo "\">
    ";
        }
        // line 6
        echo "    <div class=\"container\">
        <div class=\"carousel-caption\">
            <h1>";
        // line 8
        echo $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "h1");
        echo "</h1>
            ";
        // line 9
        echo $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "body");
        echo "
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "StefBVBundle:Blocks:carousel.item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 9,  39 => 8,  35 => 6,  27 => 4,  80 => 14,  66 => 13,  63 => 12,  41 => 8,  26 => 5,  191 => 89,  187 => 88,  182 => 86,  165 => 71,  151 => 70,  149 => 69,  146 => 68,  144 => 67,  141 => 66,  138 => 65,  135 => 64,  132 => 63,  129 => 62,  126 => 61,  108 => 60,  106 => 59,  98 => 54,  91 => 50,  84 => 46,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 11,  30 => 6,  28 => 5,  25 => 3,  23 => 3,  21 => 2,  19 => 1,);
    }
}
