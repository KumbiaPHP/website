<?php

class WpComments extends LiteRecord
{
    public function validate($a)
    {
        $b['telefono'] = $a['telefono'];
        $b['comment_post_ID'] = filter_var($a['post_ID'], FILTER_SANITIZE_NUMBER_INT);
        $b['comment_author'] = strip_tags($a['author']);
        $b['comment_author_email'] = filter_var($a['email'], FILTER_SANITIZE_EMAIL);
        $b['comment_author_url'] = filter_var($a['url'], FILTER_SANITIZE_URL);
        $b['comment_author_IP'] = $_SERVER['REMOTE_ADDR'];
        $b['comment_date'] = date('Y-m-d H:i:s');
        $b['comment_date_gmt'] = date('Y-m-d H:i:s');
        $b['comment_content'] = strip_tags($a['comment']);
        $b['comment_karma'] = 0;
        $b['comment_approved'] = 1;
        $b['comment_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $b['comment_type'] = '';
        $b['comment_parent'] = (int) $a['parent'];
        $b['user_id'] = 0;

        return $b;
    }

    public function add($a)
    {
        $b = $this->validate($a);
        if ($b['telefono']) {
            return;
        }
        unset($b['telefono']);

        $sql = 'INSERT INTO Yc08Yy853n_comments SET
            comment_post_ID = ?,
            comment_author = ?,
            comment_author_email = ?,
            comment_author_url = ?,
            comment_author_IP = ?,
            comment_date = ?,
            comment_date_gmt = ?,
            comment_content = ?,
            comment_karma = ?,
            comment_approved = ?,
            comment_agent = ?,
            comment_type = ?,
            comment_parent = ?,
            user_id = ?
        ';
        $this->query($sql, array_values($b));
    }

    public static function allComments($post_id)
    {
        $sql = 'SELECT
                c.comment_ID, 
                c.comment_author, 
                c.comment_author_email, 
                c.comment_author_url,
                c.comment_author_IP,
                c.comment_date, 
                c.comment_content, 
                c.comment_parent
            FROM Yc08Yy853n_posts p, Yc08Yy853n_comments c
            WHERE c.comment_post_ID = p.ID
            AND c.comment_post_ID = ?
            AND c.comment_approved = 1
            ORDER BY c.comment_date
        ';

        return self::all($sql, $post_id);
    }

    // ULTIMOS COMENTARIOS A PRIORI PARA EL ASIDE
    public static function latest(int $n = 4)
    {
        $sql = "SELECT c.comment_ID, c.comment_author, c.comment_author_url, CONCAT(DATE_FORMAT(post_date, '%Y/%m/%d/'), post_name) as post_link, p.post_title, p.post_name
            FROM Yc08Yy853n_posts p, Yc08Yy853n_comments c
            WHERE c.comment_post_ID = p.ID
            AND c.comment_approved = 1
            ORDER BY c.comment_date DESC
            LIMIT $n
        ";

        return self::all($sql);
    }

    // CUENTA EL NUMERO DE COMENTARIOS QUE TIENE CADA POSTS
    public function count($id = 0)
    {
        $sql = 'SELECT c.comment_post_ID
            FROM Yc08Yy853n_comments c
            WHERE c.comment_approved = 1
        ';
        if ($id) {
            $sql .= ' AND comment_post_ID=?';
        }
        $comments = $this->all($sql, $id);
        $a = [];
        foreach ($comments as $o) {
            $a[$o->comment_post_ID] = empty($a[$o->comment_post_ID]) ? 1 : ++$a[$o->comment_post_ID];
        }

        return $a;
    }

    public static function one($id)
    {
        $sql = 'SELECT * FROM Yc08Yy853n_comments c WHERE c.comment_ID = ?';

        return self::first($sql, $id);
    }

    public function edit($a)
    {
        $comment_ID = (int) $a['edit_comment'];
        $o = $this->one($comment_ID);

        if ($o->comment_author_IP == $_SERVER['REMOTE_ADDR']) :
            $b = $this->validate($a);
        if ($b['telefono']) {
            return;
        }

        $sql = 'UPDATE Yc08Yy853n_comments SET
                comment_author = ?,
                comment_author_email = ?,
                comment_author_url = ?,
                comment_content = ?
                WHERE comment_ID = ?
            ';
        $this->query($sql,
            [
                $b['comment_author'],
                $b['comment_author_email'],
                $b['comment_author_url'],
                $b['comment_content'],
                $comment_ID,
            ]);
        endif;
    }

    public function quit($id)
    {
        $o = $this->one((int) $id);
        if ($o->comment_author_IP == $_SERVER['REMOTE_ADDR']) {
            $this->query('DELETE FROM Yc08Yy853n_comments WHERE comment_ID = ?', $id);
        }
    }
}
