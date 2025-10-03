<?php

namespace App\Http\View\Composers;

use App\Model\Admin\BannerGroup;
use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();

        // danh mục blog
        $postsCategory = PostCategory::query()
            ->with([
                'childs' => function ($q) {
                    $q->orderBy('sort_order');
                },
            ])
            ->where(function ($q) {
                $q->where('parent_id', 0);
            })
            ->orderBy('sort_order')
            ->get();
        $bannerAd = BannerGroup::query()->with(['galleries.image'])->find(14);

        $view->with(['config' => $config,
           'postsCategory' => $postsCategory,
           'bannerAd' => $bannerAd,
        ]);
    }
}
