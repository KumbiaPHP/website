<?php

class _wp
{
    // EXTRAE EL CONTENIDO HASTA EL PRIMER PARRAFO
    public static function firstP($content)
    {
        if (!strstr($content, '<p>')) {
            return $content;
        }
        $content = explode('<p>', $content, 2)[1];
        $content = explode('</p>', $content, 2)[0];

        return "<p>$content</p>";
    }

    /**
     * Cut Post by more.
     * Echo part of post and link to read #more
     * or echo the enter post.
     *
     * @param string $str       Post content
     * @param string $link      Post link
     * @param string $separator by default <!--more-->
     */
    public static function cut($str, $link, $separator = '<!--more-->')
    {
        if ($pos = strpos($str, $separator)) {
            echo substr($str, 0, $pos);
            echo '<div class="continue"><a href="/blog/',$link, '#more">Continuar leyendo</a></div>';

            return;
        }
        echo $str;
    }

    /**
     * more.
     *
     * @param string $str
     * @param string $separator
     *
     * @return string
     */
    public static function more($str, $separator = '<!--more-->')
    {
        $pos = strpos($str, $separator);
        if ($pos !== false) {
            return substr_replace($str, '<span id="more"></span>', $pos, strlen($separator));
        }
        //if (strpos($str, $separator)) {
        //    return str_replace($separator, '<span id="more"></span>', $str);
        //}

        return $str;
    }
}
