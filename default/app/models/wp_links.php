<?php

class WpLinks extends LiteRecord
{
    public static function allLinks()
    {
        $sql = "SELECT link_url, link_name, link_target, link_description, link_rel FROM Yc08Yy853n_links WHERE link_visible='Y' ORDER BY link_name";

        return self::all($sql);
    }
}
