<?php

class WpPosts extends LiteRecord
{
    public static function one($slug)
    {
        // if (preg_match('/[^a-z0-9\-]/', $slug)) {
        //     throw new KumbiaException('SLUG MALO');
        // } //REPLACE(p.post_content, '<!--more-->', '<span id=more></span>') as post_content
        $sql = "SELECT p.ID, p.post_name, p.post_title, p.post_date, p.post_author, p.post_content, p.comment_count, u.user_nicename, u.user_email, u.display_name 
            FROM Yc08Yy853n_posts p, Yc08Yy853n_users u
            WHERE p.post_author = u.ID
            AND p.post_status = 'publish'
            AND p.post_name = ?
        "; //' AND DATE(p.post_date) = ?'

        return self::first($sql, $slug);
    }

    public static function allPost($year = null, $month = null, $day = null, int $page = 1)
    {
        $sql = "SELECT p.ID, p.post_name, p.post_title, DATE_FORMAT(p.post_date, '%d %M, %Y') as post_date_show, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link, p.post_author, p.post_content, p.comment_count, u.user_nicename, u.user_email, u.display_name 
            FROM Yc08Yy853n_posts p, Yc08Yy853n_users u
            WHERE p.post_author = u.ID
            AND p.post_status = 'publish'
            AND p.post_type = 'post'";
        $values = [];
        if ($day) :
            $sql .= ' AND DATE(p.post_date) = ?';
        $values[] = "$year-$month-$day"; elseif ($month) :
            $sql .= ' AND YEAR( p.post_date ) = ? AND MONTH( p.post_date ) = ?';
        $values[] = $year;
        $values[] = $month; elseif ($year) :
            $sql .= ' AND YEAR( p.post_date ) = ?';
        $values[] = $year;
        endif;
        $sql .= ' ORDER BY p.post_date DESC';
        //$start = $page > 1 ? $page * 5 : 0;
        //$sql .= " LIMIT $start, 5";

        return self::paginateQuery($sql, $page, 5, $values);
    }

    public static function latest(int $n = 5)
    {
        $sql = "SELECT post_date, post_title, post_name, DATE_FORMAT(post_date, '%d %M, %Y') as post_date_show, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link
            FROM Yc08Yy853n_posts
            WHERE post_status = 'publish'
            AND post_type = 'post'
            ORDER BY post_date DESC
            LIMIT $n
        ";

        return self::all($sql);
    }

    public static function archive()
    {
        $sql = "SELECT DATE_FORMAT(post_date, '%M %Y') as post_date_show, DATE_FORMAT(post_date, '%Y/%m/') as post_link, COUNT(post_date) as total
            FROM Yc08Yy853n_posts
            WHERE post_status = 'publish'
            GROUP BY post_link DESC
        ";

        return self::all($sql);
    }

    public static function byAuthor($author, int $page)
    {
        if (preg_match('/[^0-9a-z_ \-]/i', $author)) {
            throw new KumbiaException('AUTOR MALO');
        }
        $sql = "SELECT p.ID, p.post_name, p.post_title, DATE_FORMAT(post_date, '%d %M, %Y') as post_date_show, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link, p.post_author, p.post_content, p.comment_count, u.user_nicename, u.user_email, u.user_url, u.display_name
            FROM Yc08Yy853n_posts p, Yc08Yy853n_users u
            WHERE p.post_author = u.ID
            AND p.post_status = 'publish'
            AND p.post_type = 'post'
            AND u.user_nicename = ?
            ORDER BY p.post_date DESC
        ";
        $start = $page > 1 ? $page * 5 : 0;
        $sql .= " LIMIT $start, 5";

        $a = self::all($sql, $author);

        $sql = "SELECT meta_value FROM Yc08Yy853n_usermeta WHERE user_id={$a[0]->ID} AND meta_key = 'description'";
        $a[0]->description = self::first($sql)->meta_value;

        return $a;
    }

    public static function byQuery($search, $page = 1)
    {
        // if (preg_match('/[^0-9a-z_ \-]/i', $q)) {
        //     throw new KumbiaException('QUERY MALO');
        // }
        $sql = "SELECT p.ID, p.post_name, p.post_title, p.post_date,DATE_FORMAT(post_date, '%d %M, %Y') as post_date_show, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link, p.post_author, p.post_content, p.comment_count, u.user_nicename, u.user_email, u.user_url, u.display_name
            FROM Yc08Yy853n_posts p, Yc08Yy853n_users u
            WHERE p.post_author=u.ID
            AND p.post_status='publish'
            AND (p.post_title LIKE ? OR p.post_content LIKE ?)
        ";

        return self::paginateQuery($sql, $page, 5, ["%$search%", "%$search%"]);
    }

    public static function byTerm($term, $item, int $page = 1)
    {
        $sql = "SELECT p.ID, p.post_name, p.post_title, DATE_FORMAT(post_date, '%M %Y') as post_date_show, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link, p.post_author, p.post_content, p.comment_count, t.name, t.slug, u.user_nicename, u.user_email, u.display_name
            FROM Yc08Yy853n_posts p, Yc08Yy853n_term_relationships tr, Yc08Yy853n_term_taxonomy tt, Yc08Yy853n_terms t, Yc08Yy853n_users u
            WHERE t.term_id = tt.term_id
            AND p.ID = tr.object_id
            AND tr.term_taxonomy_id = tt.term_taxonomy_id
            AND tt.term_id = t.term_id
            AND tt.taxonomy = ?
            AND t.slug = ?
            AND p.post_type = 'post'
            AND p.post_author = u.ID
            AND p.post_status = 'publish'
            ORDER BY p.post_date DESC
        ";

        return new Kumbia\ActiveRecord\Paginator(__CLASS__, $sql, $page, 5, [$term, $item]);
    }
}
