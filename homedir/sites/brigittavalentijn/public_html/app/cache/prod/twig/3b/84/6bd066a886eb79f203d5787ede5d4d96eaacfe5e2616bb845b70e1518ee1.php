<?php

/* StefBVBundle:Blocks:news.item.index.html.twig */
class __TwigTemplate_3b846bd066a886eb79f203d5787ede5d4d96eaacfe5e2616bb845b70e1518ee1 extends Twig_Template
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
        if ((!array_key_exists("position", $context))) {
            // line 2
            echo "    ";
            $context["position"] = "odd";
        }
        // line 4
        echo "
<hr class=\"featurette-divider\">

<div class=\"row featurette\">
    ";
        // line 8
        if (((isset($context["position"]) ? $context["position"] : null) == "odd")) {
            // line 9
            echo "        <div class=\"col-md-7\">
            ";
            // line 10
            $this->env->loadTemplate("StefBVBundle:Blocks:news.item.index.content.html.twig")->display(array_merge($context, array("newsitem" => (isset($context["newsitem"]) ? $context["newsitem"] : null))));
            // line 11
            echo "        </div>
        <div class=\"col-md-5\">
            ";
            // line 13
            $this->env->loadTemplate("StefBVBundle:Blocks:news.item.index.picture.html.twig")->display(array_merge($context, array("newsitem" => (isset($context["newsitem"]) ? $context["newsitem"] : null))));
            // line 14
            echo "        </div>
    ";
        } else {
            // line 16
            echo "        <div class=\"col-md-5\">
            ";
            // line 17
            $this->env->loadTemplate("StefBVBundle:Blocks:news.item.index.picture.html.twig")->display(array_merge($context, array("newsitem" => (isset($context["newsitem"]) ? $context["newsitem"] : null))));
            // line 18
            echo "        </div>
        <div class=\"col-md-7\">
            ";
            // line 20
            $this->env->loadTemplate("StefBVBundle:Blocks:news.item.index.content.html.twig")->display(array_merge($context, array("newsitem" => (isset($context["newsitem"]) ? $context["newsitem"] : null))));
            // line 21
            echo "        </div>
    ";
        }
        // line 23
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "StefBVBundle:Blocks:news.item.index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  57 => 20,  53 => 18,  51 => 17,  48 => 16,  44 => 14,  42 => 13,  38 => 11,  36 => 10,  33 => 9,  31 => 8,  43 => 9,  39 => 8,  35 => 6,  27 => 4,  80 => 14,  66 => 13,  63 => 23,  41 => 8,  26 => 5,  191 => 89,  187 => 88,  182 => 86,  165 => 71,  151 => 70,  149 => 69,  146 => 68,  144 => 67,  141 => 66,  138 => 65,  135 => 64,  132 => 63,  129 => 62,  126 => 61,  108 => 60,  106 => 59,  98 => 54,  91 => 50,  84 => 46,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 11,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
