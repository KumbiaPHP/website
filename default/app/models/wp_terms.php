<?php

class WpTerms extends LiteRecord
{
    public static function categories()
    {
        $sql = "SELECT t.name, t.slug 
            FROM Yc08Yy853n_terms t, Yc08Yy853n_term_taxonomy tt
            WHERE t.term_id = tt.term_id
            AND tt.taxonomy = 'category'
            ORDER BY t.name";

        return self::all($sql);
    }

    public static function tagsByPost($post)
    {
        $sql = "SELECT t.name, t.slug 
            FROM Yc08Yy853n_posts p, Yc08Yy853n_term_relationships tr, Yc08Yy853n_term_taxonomy tt, Yc08Yy853n_terms t
            WHERE t.term_id = tt.term_id
            AND p.ID = tr.object_id
            AND tr.term_taxonomy_id = tt.term_taxonomy_id
            AND tt.term_id = t.term_id
            AND tt.taxonomy = 'post_tag'
            AND tr.object_id = ?
        ";

        return self::all($sql, $post);
    }
}
