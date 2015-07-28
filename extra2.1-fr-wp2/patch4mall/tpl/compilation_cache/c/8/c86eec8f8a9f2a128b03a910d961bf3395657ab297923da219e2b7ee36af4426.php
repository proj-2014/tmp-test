<?php

/* admin.twig */
class __TwigTemplate_c86eec8f8a9f2a128b03a910d961bf3395657ab297923da219e2b7ee36af4426 extends Twig_Template
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
<!--
<script type=\"text/javascript\"  src=\"/extra2.1/patch4the7/public/4tpl-admin.js\"> </script> 
-->
<script type=\"text/javascript\"  src=\"/extra2.1/patch4mall/public/4api-picasa.js\"> </script> 
</head>

<body>

<h2> Hello , this is my Admin Panel ! </h2>
<div id=\"wrap\">
<p> This is p </p>

</div>


</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "admin.twig";
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
