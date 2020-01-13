<?php

namespace Valarep\objects;

use Valarep\dao\CommentsDao;

class comments
{
    public $id;
    public $datetime;
    public $content;
    private $id_post;
}