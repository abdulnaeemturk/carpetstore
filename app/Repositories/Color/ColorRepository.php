<?php namespace App\Repositories\Color;

use Illuminate\Database\EloColorquent\Model;
use App\Models\Color\Color;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Color\ColorRepositoryInterface;
use Illuminate\Support\Collection;

class ColorRepository extends BaseRepository implements ColorRepositoryInterface
{
    public function __construct(Color $model)
    {
        parent::__construct($model);
    }
}