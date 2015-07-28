<?php

/* index.twig */
class __TwigTemplate_4607ff248438e49b708d24a89b36e45dab71d4ad40b85ddd5658e1d9fcfe003a extends Twig_Template
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
<title>   Hello ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "!  </title>

<script type=\"text/javascript\"  src=\"/extra/public/js/jquery-1.9.1.js\"> </script>
<script type=\"text/javascript\"  src=\"/extra/public/4tpl-front.js\"> </script> 

<script type=\"text/javascript\"  src=\"/extra/public/js/lightbox-2.6.min.js\"> </script>
<link rel=\"stylesheet\" type=\"text/css\"  href=\"/extra/public/css/lightbox.css\"/>
 

</head>

<body>

<h2> Hello , this is my Front Panel ! </h2>
<div id=\"wrap\">


</div>

</br>
<div>
<p>   Hello , seperate ============================   </p>
</div>
<div class=\"wrap2\">

<a class=\"lb\" href=\"https://lh3.googleusercontent.com/-kSX_nHBm5ik/VXUNT3icHgE/AAAAAAAAAKk/xJ62xX9p0CY/2015060707.jpg\"> <img src=\"https://lh3.googleusercontent.com/-kSX_nHBm5ik/VXUNT3icHgE/AAAAAAAAAKk/xJ62xX9p0CY/2015060707.jpg\" width=200 /></a>
</div>

</html>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
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
