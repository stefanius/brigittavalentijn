<?php

/* StefBVBundle:Blocks:carousel.base.html.twig */
class __TwigTemplate_c3dd7e7cb8277ac51bf3d337a14baf25974cd3aa4a5e5445b88e688e59449966 extends Twig_Template
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
        if (array_key_exists("carouselItems", $context)) {
            // line 2
            echo "    <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
        <!-- Indicators -->
        <ol class=\"carousel-indicators\">
            ";
            // line 5
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["carouselItems"]) ? $context["carouselItems"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["car"]) {
                // line 6
                echo "                <li data-target=\"#myCarousel\" data-slide-to=\"";
                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                echo "\" class=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["car"]) ? $context["car"] : null), "active"), "html", null, true);
                echo "\"></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['car'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "
        </ol>
        <div class=\"carousel-inner\">
            ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["carouselItems"]) ? $context["carouselItems"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
                // line 12
                echo "                ";
                $this->env->loadTemplate("StefBVBundle:Blocks:carousel.item.html.twig")->display(array_merge($context, array("car" => (isset($context["car"]) ? $context["car"] : null))));
                // line 13
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "
        </div>
        <a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a>
        <a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "StefBVBundle:Blocks:carousel.base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 14,  66 => 13,  63 => 12,  41 => 8,  26 => 5,  191 => 89,  187 => 88,  182 => 86,  165 => 71,  151 => 70,  149 => 69,  146 => 68,  144 => 67,  141 => 66,  138 => 65,  135 => 64,  132 => 63,  129 => 62,  126 => 61,  108 => 60,  106 => 59,  98 => 54,  91 => 50,  84 => 46,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 11,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
