<?php

namespace D4T\Admin\Demos\Repositories;

use Dcat\Admin\Grid;
use Illuminate\Support\Facades\Log;
use Dcat\Admin\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

class ComingSoon extends Repository
{
    //fix api
    protected $api = 'https://api.douban.com/v2/movie/coming_soon';

    protected $apiKey = 'apikey=0b2bdeda43b5688921839c8ecb20399b';

    /**
     * 查询表格数据
     *
     * @param Grid\Model $model
     * @return LengthAwarePaginator
     */
    public function get(Grid\Model $model)
    {
        $currentPage = $model->getCurrentPage();
        $perPage = $model->getPerPage();

        // 获取筛选参数
        $city = '广州';

        $start = ($currentPage - 1) * $perPage;

        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->get("{$this->api}?{$this->apiKey}&city=$city&start=$start&count=$perPage");
            $data = json_decode((string)$response->getBody(), true);
        } catch (\Exception $ex) {
            Log::critical($ex->getMessage());
        }

        return $model->makePaginator(
            $data['total'] ?? 0,
            $data['subjects'] ?? []
        );
    }
}
