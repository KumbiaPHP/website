<?php

declare(strict_types=1);

class BlogController extends AppController
{
    protected $page = false;
    public $paginate = '/blog/';
    public $aside = true; // cambiar a nombre de partial por defecto aside

    protected function before_filter()
    {
        View::select('posts', 'blog');
        // Usar directamente controlador/pagina
        if (!method_exists($this, $this->action_name)) {
            array_unshift($this->parameters, $this->action_name);
            $this->action_name = 'index';
        }
        if (isset($this->parameters[1]) && $this->parameters[1] === 'page') {
            $this->page = true;
            unset($this->parameters[1]);
        }
    }

    public function index($year = null, $month = null, $day = null, $slug = '')
    {
        if ($slug) {
            // if (Input::is('POST')) {
            //     if (!empty($_POST['add_comment'])) {
            //         (new WpComments())->add($_POST);
            //     } elseif (!empty($_POST['edit_comment'])) {
            //         (new WpComments())->edit($_POST);
            //     } elseif (!empty($_POST['quit_comment'])) {
            //         (new WpComments())->quit($_POST['quit_comment']);
            //     }

            //     $comment_id = Input::get('editar');
            //     if (!$comment_id) {
            //         $comment_id = Input::get('responder');
            //     }
            //     $this->comment = ($comment_id) ? (new WpComments())->one($comment_id) : '';
            // }

            if (!$this->post = WpPosts::one($slug)) {
                throw new KumbiaException('no post');
            }
            $this->tags = WpTerms::tagsByPost($this->post->ID);
            $this->comments = $this->post->comment_count ? WpComments::allComments($this->post->ID) : null;
            View::select('post');

            return;
        }

        $params = count($this->parameters);
        if ($this->page) {
            -$params;
        }

        $this->posts = WpPosts::allPost($year, $month, $day);
        if (!$this->posts) {
            throw new KumbiaException('Sin datos para esta página.');
        }
        switch ($params) {
            case 1:
                $this->paginate .= "$year/";
                break;
            case 2:
                $this->paginate .= "$year/$month/";
                break;
            case 3:
                $this->paginate .= "$year/$month/$day/";
                break;
        }
        //$this->paginate .= str_replace('//', '/', "$year/$month/$day");
    }

    public function author($author, int $page = 1)
    {
        $this->posts = WpPosts::byAuthor($author, $page);
        $this->paginate .= "author/$author/";
        $this->main_header = $this->posts[0]->display_name;
        $this->header_type = 'Autor: ';
        $this->author = 1;
        $this->aside = false;
    }

    public function category($category, int $page = 1)
    {
        $this->posts = WpPosts::byTerm('category', $category, $page);
        if (!$this->posts) {
            throw new KumbiaException('Sin datos para esta página.');
        }
        $this->main_header = h($category);
        //$this->main_header = $this->posts->name;
        $this->header_type = 'Categoría: ';
        $this->paginate .= "category/$category/";
        $this->aside = false;
        $this->title = 'Categoría '.h($category);
    }

    public function search($search = '', int $page = 1)
    {
        $search = $search ?: $_GET['q'];
        $this->posts = WpPosts::byQuery($search, $page);
        $this->main_header = h($search);
        $this->header_type = 'Has buscado ';
        $this->paginate .= "search/$search/";
        $this->title = 'Has buscado '.h($search);
    }

    public function tag($tag, int $page = 1)
    {
        $this->posts = WpPosts::byTerm('post_tag', $tag, $page);
        if (!$this->posts) {
            throw new KumbiaException('Sin datos para esta página.');
        }
        $this->main_header = mb_strtoupper($tag);
        $this->header_type = 'Etiqueta: ';
        $this->paginate .= "tag/$tag/";
        $this->aside = false;
    }

    public function page(int $page = 1)
    {
        if ($page === 1) {
            Redirect::to();

            return;
        }
        $this->posts = WpPosts::allPost(null, null, null, $page);
        if (!$this->posts) {
            throw new KumbiaException('Sin datos para esta página.');
        }
    }
}
