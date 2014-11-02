<?php

/* StefBVBundle:Blocks:news.item.index.content.html.twig */
class __TwigTemplate_96fb8e4eded9b5d6d522726678b2ea6fef9c0d5f9880029ce4628fc48063ee53 extends Twig_Template
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
        echo "<h2 class=\"featurette-heading\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("stef_bvbundle_news_show", array("slug" => $this->getAttribute((isset($context["newsitem"]) ? $context["newsitem"] : null), "slug"))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["newsitem"]) ? $context["newsitem"] : null), "title"), "html", null, true);
        echo "</a></h2>
<p class=\"lead\">";
        // line 2
        echo twig_escape_filter($this->env, (((twig_length_filter($this->env, $this->getAttribute((isset($context["newsitem"]) ? $context["newsitem"] : null), "bodytext")) > 200)) ? ((strip_tags(twig_slice($this->env, $this->getAttribute((isset($context["newsitem"]) ? $context["newsitem"] : null), "bodytext"), 0, 200)) . "...")) : (strip_tags($this->getAttribute((isset($context["newsitem"]) ? $context["newsitem"] : null), "bodytext")))), "html", null, true);
        echo "</p>

";
    }

    public function getTemplateName()
    {
        return "StefBVBundle:Blocks:news.item.index.content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  57 => 20,  53 => 18,  51 => 17,  48 => 16,  44 => 14,  42 => 13,  38 => 11,  36 => 10,  33 => 9,  31 => 8,  43 => 9,  39 => 8,  35 => 6,  27 => 4,  80 => 14,  66 => 13,  63 => 23,  41 => 8,  26 => 2,  191 => 89,  187 => 88,  182 => 86,  165 => 71,  151 => 70,  149 => 69,  146 => 68,  144 => 67,  141 => 66,  138 => 65,  135 => 64,  132 => 63,  129 => 62,  126 => 61,  108 => 60,  106 => 59,  98 => 54,  91 => 50,  84 => 46,  73 => 37,  71 => 36,  54 => 22,  50 => 21,  46 => 11,  30 => 6,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
