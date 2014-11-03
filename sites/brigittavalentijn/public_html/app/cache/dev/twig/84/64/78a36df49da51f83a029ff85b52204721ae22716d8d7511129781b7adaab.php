<?php

/* StefBVBundle:Blocks:carousel.item.html.twig */
class __TwigTemplate_846478a36df49da51f83a029ff85b52204721ae22716d8d7511129781b7adaab extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : $this->getContext($context, "car")), "active"), "html", null, true);
        echo "\">

    ";
        // line 3
        if ($this->getAttribute((isset($context["car"]) ? $context["car"] : null), "imageurl", array(), "any", true, true)) {
            // line 4
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : $this->getContext($context, "car")), "imageurl"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : $this->getContext($context, "car")), "imagealt"), "html", null, true);
            echo "\">
    ";
        }
        // line 6
        echo "    <div class=\"container\">
        <div class=\"carousel-caption\">
            <h1>";
        // line 8
        echo $this->getAttribute((isset($context["car"]) ? $context["car"] : $this->getContext($context, "car")), "h1");
        echo "</h1>
            ";
        // line 9
        echo $this->getAttribute((isset($context["car"]) ? $context["car"] : $this->getContext($context, "car")), "body");
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
        return array (  43 => 9,  39 => 8,  35 => 6,  27 => 4,  80 => 14,  66 => 13,  63 => 12,  41 => 8,  26 => 5,  188 => 89,  184 => 88,  179 => 86,  162 => 71,  148 => 70,  146 => 69,  143 => 68,  141 => 67,  138 => 66,  135 => 65,  132 => 64,  129 => 63,  126 => 62,  123 => 61,  105 => 60,  103 => 59,  95 => 54,  88 => 50,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 11,  30 => 6,  28 => 5,  25 => 3,  23 => 3,  21 => 2,  19 => 1,);
    }
}
