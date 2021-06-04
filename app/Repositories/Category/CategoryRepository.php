<?php namespace App\Repositories\Category;

use Illuminate\Database\EloCategoryquent\Model;
use App\Models\Category\Category;
use App\Repositories\BaseRepository;
use App\RepositoryInterfaces\Category\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}