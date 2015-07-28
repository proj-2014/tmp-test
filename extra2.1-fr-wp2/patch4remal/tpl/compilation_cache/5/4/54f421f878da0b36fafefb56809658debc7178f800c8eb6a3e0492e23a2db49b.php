<?php

/* admin2.twig */
class __TwigTemplate_54f421f878da0b36fafefb56809658debc7178f800c8eb6a3e0492e23a2db49b extends Twig_Template
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
<script type=\"text/javascript\"  src=\"/extra2/common/public/js/jquery-1.9.1.js\"> </script>
<script type=\"text/javascript\"  src=\"/extra2/common/public/4tpl-admin.js\"> </script> 
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
        return "admin2.twig";
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
