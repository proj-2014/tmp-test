<?php

/* test.twig */
class __TwigTemplate_c0161ef09793fa9be1cffcf949795df2bd868aa3f520695d49119af0a7f65885 extends Twig_Template
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
        echo "
<html>
<head>
<title> Hello ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "! </title>
<script type=\"text/javascript\"  src=\"/extra2.1/common/public/js/jquery-1.9.1.js\"> </script>
<script type=\"text/javascript\" src=\"/extra2.1/common/public/js/underscore.min.js\"></script> 
<script type=\"text/javascript\" src=\"/extra2.1/common/public/js/behavior.js\"></script>
<script type=\"text/javascript\"  src=\"/extra2.1/patch4mall/public/4node-test.js\"> </script> 
</head>

<body>

<h2 class=\"c1\"> Hello , this is my Admin Panel ! </h2>
<div id=\"wrap\">
<p class=\"ppp\"> This is p </p>
<h2> will hide soon</h2>
</div>

<span class=\"more-expand\">
   <span class='pruned'>Lorem ipsum dolor sit amet <a class=\"more\">(show more)</a></span>
   <span class='all hide'>
      , consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      <a class=\"less\">(show less)</a>
   </span>
</span>

<div class=\"testajax\">
<a class=\"more-link\"> click and more link </a>
</div>

</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "test.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 4,  19 => 1,);
    }
}
