<?php

class Escaparate extends ActiveRecord
{

    const INACTIVE = '0';
    const ACTIVE = 1;
    const IMG_WIDTH = 300;
    const IMG_HEIGHT = 300;
    const THUMB_WIDTH = 150;
    const THUMB_HEIGHT = 110;
    
    protected function initialize()
    {
        $this->belongs_to('pais');
        $this->belongs_to('categoria');
    }

    public function findByStatus($status = self::ACTIVE, $page = 1)
    {
        $status = (int) $status;
        return $this->paginate("status = '$status'", "page: $page");
    }

    public function findByTag($tag, $page = 1)
    {
        $tag = addslashes($tag);

        return $this->paginate("tags LIKE '%{$tag}%' AND status = '1'"
                        , "page: $page");
    }

    public function findByTitle($title)
    {
        $title = addslashes($title);

        return $this->find_first("title  = '{$title}' AND status = '1'");
    }

    public function findByCategoria($cat, $page = 1)
    {
        $cat = addslashes($cat);

        return $this->paginate_by_sql("SELECT escaparate.*
                                       FROM escaparate
                                       INNER JOIN  categoria ON categoria_id = categoria.id
                                       WHERE categoria.name = '$cat' 
                                       AND escaparate.status = '1'
                                       AND categoria.status = '1'
                                        ", "page: $page");
    }

    public function findByPais($pais, $page = 1)
    {
        $pais = addslashes($pais);

        return $this->paginate_by_sql("SELECT escaparate.*
                                       FROM escaparate
                                       INNER JOIN  pais ON pais_id = pais.id
                                       WHERE pais.name = '$pais' AND status = '1'", "page: $page");
    }

    public function add(array $data, ImageUpload $image)
    {
        $image->setPath($path = dirname(APP_PATH) . '/public/img/escaparate/');

        if (!$imageName = $image->saveRandom()) {
            return false;
        }

        $data['image'] = 'escaparate/' . $this->resizeImage($path . $imageName);
        $data['thumbnail'] = 'escaparate/' . $this->createThumbnail($path . $imageName);

        $data['status'] = self::INACTIVE;

        return $this->save($data);
    }

    public function getTags()
    {
        return explode(' ', $this->tags);
    }

    protected function resizeImage($imgFile)
    {
        $resizer = new SimpleImage();
        $resizer->load($imgFile);
        $resizer->resize(self::IMG_WIDTH, self::IMG_HEIGHT);
        $resizer->save($imgFile);

        return basename($imgFile);
    }

    protected function createThumbnail($imgFile)
    {
        $resizer = new SimpleImage();
        $resizer->load($imgFile);
        $resizer->resize(self::THUMB_WIDTH, self::THUMB_HEIGHT);

        $thumbFilename = dirname($imgFile) . '/thumb_' . basename($imgFile);

        $resizer->save($thumbFilename);

        return basename($thumbFilename);
    }

}